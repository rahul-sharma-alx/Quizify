<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description'
    ];

    /**
     * A role may be given to many users.
     */
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    /**
     * A role may have many permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class)->withTimestamps();
    }
    /**
     * Check if the role has a specific permission.
     */
    public function hasPermission($permission)
    {
        return $this->permissions()->where('slug', $permission)->exists();
    }
    /**
     * Check if the role has a specific permission by name.
     */
    public function hasPermissionByName($name)
    {
        return $this->permissions()->where('name', $name)->exists();
    }
}
