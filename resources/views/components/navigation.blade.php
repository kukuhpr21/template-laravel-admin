<nav class="flex flex-row items-center justify-between fixed top-0 z-50 w-full bg-transparent p-2">
    <div class="flex flex-row gap-2 items-center">
        <button class="hover:rounded-xl hover:bg-slate-300 hover:drop-shadow-lg p-2">
            <i class="ri-align-left ri-xl"></i>
        </button>
        <div class="flex flex-col">
            <span class="text-sm text-slate-400 font-light">Good Morning,</span>
            <span class="text-base text-slate-700 font-medium">Kukuh Prakoso</span>
        </div>
    </div>
    <div class="hs-dropdown relative inline-flex">
        <button id="hs-dropdown-with-dividers" type="button" class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-full border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
          <div class="flex flex-row gap-2">
            <span class="flex inline-block size-[38px] items-center justify-center bg-gray-100 rounded-full overflow-hidden">
                <i class="ri-user-line ri-xl text-gray-300"></i>
                {{-- <svg class="size-full text-gray-300" width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.62854" y="0.359985" width="15" height="15" rx="7.5" fill="white"></rect>
                    <path d="M8.12421 7.20374C9.21151 7.20374 10.093 6.32229 10.093 5.23499C10.093 4.14767 9.21151 3.26624 8.12421 3.26624C7.0369 3.26624 6.15546 4.14767 6.15546 5.23499C6.15546 6.32229 7.0369 7.20374 8.12421 7.20374Z" fill="currentColor"></path>
                    <path d="M11.818 10.5975C10.2992 12.6412 7.42106 13.0631 5.37731 11.5537C5.01171 11.2818 4.69296 10.9631 4.42107 10.5975C4.28982 10.4006 4.27107 10.1475 4.37419 9.94123L4.51482 9.65059C4.84296 8.95684 5.53671 8.51624 6.30546 8.51624H9.95231C10.7023 8.51624 11.3867 8.94749 11.7242 9.62249L11.8742 9.93184C11.968 10.1475 11.9586 10.4006 11.818 10.5975Z" fill="currentColor"></path>
                </svg> --}}
            </span>
            <div class="flex flex-col">
                <span class="text-sm text-slate-700 font-normal">Kukuh Prakoso</span>
                <span class="text-xs text-slate-400 font-light">Super Admin</span>
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
