<nav class="fixed top-0 z-50 w-full bg-white">
    <div class="px-3 py-3 lg:px-5 lg:pl-3">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-start rtl:justify-end">
                <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar"
                    type="button"
                    class="inline-flex items-center px-2 py-3  text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                    <span class="sr-only">Open sidebar</span>
                    <i class="ri-align-left ri-xl text-gray-800"></i>
                </button>
                <a href="{{ route('dashboard') }}" class="lg:flex items-end ms-2 md:me-24 hidden">
                    <x-logo />
                </a>
            </div>
            <!-- Toggle Profile -->
            <div class="relative inline-block text-left">
                <div class="flex">
                    <button type="button"
                        class="inline-flex w-full items-center justify-center gap-x-1.5 bg-gray-100 rounded-md lg:px-4 px-2 lg:py-2 py-1 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200"
                        aria-expanded="false" data-dropdown-toggle="dropdown-user">
                        <span class="sr-only">Open user menu</span>
                        <img src="{{ asset('images/ic_def_profile.png') }}" alt="profile"
                            class="lg:w-10 lg:h-10 w-8 h-8">
                        <div class="flex flex-col px-1 items-start">
                            <span class="lg:text-base text-sm lg:font-semibold font-medium text-gray-800">John
                                Doe</span>
                            <span class="lg:text-sm text-xs lg:font-normal font-light text-gray-600">Admin</span>
                        </div>
                    </button>
                </div>
                <div class="z-50 hidden my-8 w-full  text-base list-none bg-white divide-y divide-gray-100 rounded shadow"
                    id="dropdown-user">
                    <ul class="py-1" role="none">
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Profile</a>
                        </li>
                        <li>
                            <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"
                                role="menuitem">Sign out</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</nav>
