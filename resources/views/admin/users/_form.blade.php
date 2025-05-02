<div class="grid grid-cols-6 gap-6">
    <div class="col-span-6 sm:col-span-3">
        <label for="name" class="block text-sm font-medium text-gray-700">Full Name</label>
        <input type="text" name="name" id="name" autocomplete="name" value="{{ old('name', isset($user) ? $user->name : '') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('name') border-red-500 @enderror">
        @error('name')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 sm:text-sm">
                @
            </span>
            <input type="text" name="username" id="username" autocomplete="username" value="{{ old('username', isset($user) ? $user->username : '') }}" class="focus:ring-blue-500 focus:border-blue-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300 @error('username') border-red-500 @enderror">
        </div>
        @error('username')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-span-6 sm:col-span-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
        <input type="email" name="email" id="email" autocomplete="email" value="{{ old('email', isset($user) ? $user->email : '') }}" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('email') border-red-500 @enderror">
        @error('email')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="role_id" class="block text-sm font-medium text-gray-700">Role</label>
        <select id="role_id" name="role_id" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm @error('role_id') border-red-500 @enderror">
            <option value="">Select a role</option>
            @foreach($roles as $role)
                <option value="{{ $role->id }}" {{ old('role_id', isset($user) && $user->roles->first() ? $user->roles->first()->id : '') == $role->id ? 'selected' : '' }}>{{ $role->name }}</option>
            @endforeach
        </select>
        @error('role_id')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="is_active" class="block text-sm font-medium text-gray-700">Status</label>
        <select id="is_active" name="is_active" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm">
            <option value="1" {{ old('is_active', isset($user) ? $user->is_active : 1) ? 'selected' : '' }}>Active</option>
            <option value="0" {{ !old('is_active', isset($user) ? $user->is_active : 1) ? 'selected' : '' }}>Inactive</option>
        </select>
    </div>

    <div class="col-span-6">
        <label class="block text-sm font-medium text-gray-700">
            Avatar
        </label>
        <div class="mt-1 flex items-center">
            <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                @if(isset($user) && $user->avatar_url)
                    <img src="{{ $user->avatar_url }}" alt="{{ $user->name }}" class="h-full w-full">
                @else
                    <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                @endif
            </span>
            <label for="avatar" class="ml-5 relative cursor-pointer bg-white py-2 px-3 border border-gray-300 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                <span>Change</span>
                <input id="avatar" name="avatar" type="file" class="sr-only">
            </label>
        </div>
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input type="password" name="password" id="password" autocomplete="new-password" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md @error('password') border-red-500 @enderror">
        @error('password')
            <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
        @enderror
    </div>

    <div class="col-span-6 sm:col-span-3">
        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm Password</label>
        <input type="password" name="password_confirmation" id="password_confirmation" autocomplete="new-password" class="mt-1 focus:ring-blue-500 focus:border-blue-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
    </div>
</div>