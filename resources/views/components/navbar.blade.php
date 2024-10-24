<nav class="flex flex-row items-center justify-between sticky top-0 z-50 w-full bg-gradient-to-r from-gray-50 to-gray-100 p-2">
    <div class="flex flex-row gap-2 items-center">
        <button class="lg:hidden hover:rounded-xl hover:bg-slate-100 hover:drop-shadow-lg p-2" aria-haspopup="dialog" aria-expanded="false" aria-controls="sidebar" aria-label="Toggle navigation" data-hs-overlay="#sidebar">
            <i class="ri-align-left ri-xl"></i>
        </button>
        <div class="flex flex-col">
            <span class="text-sm text-slate-400 font-light">Hello,</span>
            <span class="text-base text-slate-700 font-medium">Kukuh Prakoso</span>
        </div>
    </div>
    <div class="hs-dropdown relative inline-flex mr-2">
        <button id="hs-dropdown-with-dividers" type="button" class="hs-dropdown-toggle lg:py-3 py-2 lg:px-4 px-3 inline-flex items-center lg:gap-x-2 gap-x-1 lg:text-sm text-xs lg:font-medium font-normal rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
            <div class="flex flex-row lg:gap-2 gap-1">
                <span class="flex size-[38px] items-center justify-center bg-gray-100 rounded-full overflow-hidden">
                    <i class="ri-user-line lg:ri-xl ri-lg text-gray-300"></i>
                </span>
                <div class="flex flex-col items-start">
                    <span class="text-sm text-slate-700 lg:font-normal font-light">Kukuh Prakoso</span>
                    <span class="text-xs text-slate-400 lg:font-light font-extralight">Super Admin</span>
                </div>
            </div>
            <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
        </button>

        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 divide-y divide-gray-200" role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-dividers">
            <div class="p-1 space-y-0.5">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#">
                Profile
                </a>
            </div>
            <div class="p-1 space-y-0.5">
                <a class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100" href="#">
                Sign out
                </a>
            </div>
        </div>
    </div>
</nav>
