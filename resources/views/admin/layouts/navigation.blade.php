<aside class="w-full md:w-64 bg-white shadow-md md:shadow-none md:border-r md:border-gray-200 transition-all duration-300 ease-in-out fixed md:static inset-y-0 left-0 z-40 transform -translate-x-full md:translate-x-0" :class="{ 'translate-x-0': mobileMenuOpen }">
    <div class="h-16 flex items-center px-4 border-b border-gray-200 md:hidden">
        <x-application-logo class="h-8 w-auto" />
    </div>
    
    <div class="overflow-y-auto h-full py-4 px-3">
        <nav>
            <ul class="space-y-1">
                <li>
                    <a href="{{ route('admin.dashboard') }}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.dashboard') ? 'bg-gray-100 font-medium' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-700 transition duration-75" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
                            <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
                        </svg>
                        <span class="ml-3">Dashboard</span>
                    </a>
                </li>
                
                <li>
                    <a href="{{route('admin.users.index')}}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.users.*') ? 'bg-gray-100 font-medium' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-700 transition duration-75" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path>
                        </svg>
                        <span class="ml-3">Users</span>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.questions.index')}}" class="flex items-center p-3 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.questions.*') ? 'bg-gray-100 font-medium' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-700 transition duration-75" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M18 10c0 4.418-3.582 8-8 8s-8-3.582-8-8 3.582-8 8-8 8 3.582 8 8zm-8-6a6 6 0 100 12 6 6 0 000-12zm.75 9a.75.75 0 11-1.5 0v-1.5a.75.75 0 111.5 0V13zm-.75-7a1.5 1.5 0 100 3 1.5 1.5 0 000-3z"></path>
                        </svg>
                        <span class="ml-3">Questions</span>
                    </a>
                </li>
                
                <!-- More menu items -->
                
                <li class="pt-4 mt-4 border-t border-gray-200">
                    <a href="" class="flex items-center p-3 rounded-lg hover:bg-gray-100 group {{ request()->routeIs('admin.settings') ? 'bg-gray-100 font-medium' : '' }}">
                        <svg class="w-5 h-5 text-gray-500 group-hover:text-gray-700 transition duration-75" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M11.49 3.17c-.38-1.56-2.6-1.56-2.98 0a1.532 1.532 0 01-2.286.948c-1.372-.836-2.942.734-2.106 2.106.54.886.061 2.042-.947 2.287-1.561.379-1.561 2.6 0 2.978a1.532 1.532 0 01.947 2.287c-.836 1.372.734 2.942 2.106 2.106a1.532 1.532 0 012.287.947c.379 1.561 2.6 1.561 2.978 0a1.533 1.533 0 012.287-.947c1.372.836 2.942-.734 2.106-2.106a1.533 1.533 0 01.947-2.287c1.561-.379 1.561-2.6 0-2.978a1.532 1.532 0 01-.947-2.287c.836-1.372-.734-2.942-2.106-2.106a1.532 1.532 0 01-2.287-.947zM10 13a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd"></path>
                        </svg>
                        <span class="ml-3">Settings</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>