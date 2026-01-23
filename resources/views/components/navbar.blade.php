<nav x-data="{ open: false }" class="border-2 boder-gray-800 bg-white rounded-xl mt-3 mr-8">
    <!-- Primary Navigation Menu -->
    <div class="mx-auto">
        <div class="flex justify-between h-11">
            <div class="flex">
                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('user-management-system.index')" :active="request()->routeIs('user-management-system.index')"><i class="fa-regular fa-house mr-2"></i>
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </div>
                <div class="hidden sm:flex items-center text-gray-400 ml-4">
                    <i class="fa-solid fa-chevron-right text-xs"></i>
                </div>
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('user-management-system.userList')" :active="request()->routeIs('user-management-system.userList')"><i class="fa-solid fa-gear mr-2"></i>
                        {{ __('Settings') }}
                    </x-nav-link>
                </div>
            </div>

        </div>
    </div>

</nav>
