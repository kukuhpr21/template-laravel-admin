<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Source+Code+Pro:ital,wght@0,200..900;1,200..900&display=swap"
        rel="stylesheet">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="bg-gray-200">

    <nav class="fixed top-0 z-50 w-full bg-white">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center px-2 py-3  text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200">
                        <span class="sr-only">Open sidebar</span>
                        <i class="ri-align-left ri-xl text-gray-800"></i>
                    </button>
                    <a href="https://flowbite.com" class="lg:flex items-center ms-2 md:me-24 hidden">
                        <span class="font-bold text-xl text-white bg-blue-500 rounded-md px-3 py-2">A</span>
                        <span class="font-bold text-lg text-gray-800 pl-2">Admin</span>
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

    <aside id="logo-sidebar"
        class="fixed top-0 left-0 z-40 w-64 rounded-lg h-screen pt-24 transition-transform -translate-x-full bg-white sm:translate-x-0"
        aria-label="Sidebar">
        <div class="h-full px-3 py-4 overflow-y-auto bg-white rounded-lg">
            <ul class="space-y-2 font-medium">
                <li>
                    <a href="#"
                        class="flex items-center px-2 py-3 font-medium bg-blue-200 text-gray-900 rounded-lg hover:bg-blue-100 group">
                        <i class="ri-home-2-fill ri-xl transition duration-75 group-hover:text-gray-900"
                            aria-hidden="true"></i>
                        <span class="ms-3">Dashboard</span>
                    </a>
                </li>
                <li>
                    <button type="button"
                        class="flex items-center w-full px-2 py-3 text-base text-gray-900 transition duration-75 rounded-lg group hover:bg-blue-100"
                        aria-controls="dropdown-example" data-collapse-toggle="dropdown-example">
                        <i
                            class="ri-shopping-basket-line ri-xl text-gray-900 transition duration-75 group-hover:ri-shopping-basket-fill"></i>
                        <span class="flex-1 ms-3 text-left rtl:text-right whitespace-nowrap">E-commerce</span>
                        <i class="ri-arrow-down-s-line ri-xl"></i>
                    </button>
                    <ul id="dropdown-example" class="hidden py-2 space-y-2">
                        <li>
                            <a href="#"
                                class="flex items-center w-full p-2 text-gray-900 transition duration-75 rounded-lg pl-11 group hover:bg-gray-100">Products</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </aside>

    <div class="px-4 py-8  sm:ml-64">
        <div class="p-4 mt-14">
            <div class="grid grid-cols-3 gap-4 mb-4">
                <div class="flex items-center justify-center h-24 rounded bg-gray-50">
                    <p class="text-2xl text-gray-400">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center h-24 rounded bg-gray-50">
                    <p class="text-2xl text-gray-400">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
                <div class="flex items-center justify-center h-24 rounded bg-gray-50">
                    <p class="text-2xl text-gray-400">
                        <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 18 18">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="M9 1v16M1 9h16" />
                        </svg>
                    </p>
                </div>
            </div>

        </div>
    </div>


</body>

</html>
