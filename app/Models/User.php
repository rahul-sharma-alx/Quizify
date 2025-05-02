<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Collection;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'username',
        'password',
        'avatar',
        'is_active',
        'last_active_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_secret',
        'two_factor_recovery_codes',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'is_active' => 'boolean',
        'last_active_at' => 'datetime',
        'two_factor_confirmed_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'avatar_url',
    ];

    /**
     * Boot the model.
     */
    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($user) {
            // Clean up relationships when user is deleted
            $user->roles()->detach();
            
            // Delete avatar file if exists
            if ($user->avatar) {
                \Storage::disk('public')->delete($user->avatar);
            }
        });
    }

    /**
     * Get the URL to the user's avatar.
     *
     * @return string
     */
    public function getAvatarUrlAttribute()
    {
        return $this->avatar
            ? \Storage::disk('public')->url($this->avatar)
            : $this->defaultAvatarUrl();
    }

    /**
     * Get the default avatar URL.
     *
     * @return string
     */
    protected function defaultAvatarUrl()
    {
        $name = collect(explode(' ', $this->name))
        ->map(function ($segment) {
            return mb_substr($segment, 0, 1);
        })
        ->join('');

        return 'https://ui-avatars.com/api/?name='.urlencode($name).'&color=7F9CF5&background=EBF4FF';
    }

    /**
     * A user may have multiple roles.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    /**
     * Assign the given role to the user.
     *
     * @param  string|Role  $role
     * @return void
     */
    public function assignRole($role)
    {
        $this->roles()->syncWithoutDetaching(
            $this->parseRole($role)
        );
    }

    /**
     * Remove the given role from the user.
     *
     * @param  string|Role  $role
     * @return void
     */
    public function removeRole($role)
    {
        $this->roles()->detach(
            $this->parseRole($role)
        );
    }

    /**
     * Sync the user's roles.
     *
     * @param  array  $roles
     * @return void
     */
    public function syncRoles(array $roles)
    {
        $this->roles()->sync(
            collect($roles)->map(function ($role) {
                return $this->parseRole($role)->id;
            })
        );
    }

    /**
     * Parse the role to a Role model if needed.
     *
     * @param  string|Role  $role
     * @return Role
     */
    protected function parseRole($role)
    {
        return $role instanceof Role ? $role : Role::where('slug', $role)->firstOrFail();
    }

    /**
     * Determine if the user has the given role.
     *
     * @param  string|Role  $role
     * @return bool
     */
    public function hasRole($role)
    {
        if (is_string($role)) {
            return $this->attributes['role'] === $role || $this->roles->contains('slug', $role);
        }

        return $role instanceof Role ? $this->roles->contains('id', $role->id) : false;
    }

    /**
     * Determine if the user has any of the given roles.
     *
     * @param  array|string  $roles
     * @return bool
     */
    public function hasAnyRole($roles)
    {
        $roles = is_array($roles) ? $roles : func_get_args();

        foreach ($roles as $role) {
            if ($this->hasRole($role)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Determine if the user has all of the given roles.
     *
     * @param  array|string  $roles
     * @return bool
     */
    public function hasAllRoles($roles)
    {
        $roles = is_array($roles) ? $roles : func_get_args();

        foreach ($roles as $role) {
            if (!$this->hasRole($role)) {
                return false;
            }
        }

        return true;
    }

    /**
     * Get all permissions associated with the user's roles.
     *
     * @return Collection
     */
    public function getPermissionsAttribute()
    {
        return $this->roles->flatMap->permissions->pluck('slug')->unique();
    }

    /**
     * Determine if the user has the given permission.
     *
     * @param  string  $permission
     * @return bool
     */
    public function hasPermission($permission)
    {
        return $this->permissions->contains($permission) || 
               $this->hasRole('admin'); // Admins have all permissions
    }

    /**
     * Check if user is an admin (convenience method).
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->hasRole('admin');
    }

    /**
     * Check if user is active.
     *
     * @return bool
     */
    public function isActive()
    {
        return $this->is_active;
    }

    /**
     * Update the last active timestamp.
     *
     * @return bool
     */
    public function updateLastActive()
    {
        return $this->update(['last_active_at' => now()]);
    }
}