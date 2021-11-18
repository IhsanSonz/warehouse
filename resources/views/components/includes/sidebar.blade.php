<div class="md:flex flex-col md:flex-row md:min-h-screen w-full">
    <div class="flex flex-col w-full md:w-48 text-gray-700 bg-white flex-shrink-0 border-r-2">
        <div class="flex-shrink-0 px-8 py-4 flex flex-row items-center justify-between">
            <a href="#"
                class="text-lg font-semibold tracking-widest text-gray-900 uppercase rounded-lg focus:outline-none focus:shadow-outline">WAREHOUSE</a>
            <button class="md:hidden rounded-lg focus:outline-none focus:shadow-outline">
                <img class="w-6 h-6" src="{{ asset('assets/icons/icons8-menu.svg') }}" alt="Icon">
            </button>
        </div>
        <nav class="flex-grow hidden md:block px-4 pb-4 md:pb-0 md:overflow-y-auto">
            <a class="sidebar-item {{ $active === 'home' ? 'active' : 'inactive' }}"
                href="#">
                <div class="flex row items-center">
                    <img class="mr-4" src="{{ asset('assets/icons/icons8-check-32.png') }}" alt="home">
                    <span>Home</span>
                </div>
            </a>
            <a class="sidebar-item {{ $active === 'portfolio' ? 'active' : 'inactive' }}"
                href="#">Portfolio</a>
            <a class="sidebar-item {{ $active === 'about' ? 'active' : 'inactive' }}"
                href="#">About</a>
            <a class="sidebar-item {{ $active === 'contact' ? 'active' : 'inactive' }}"
                href="#">Contact</a>
            <div class="relative">
                <button onclick="set_dropdown(this);"
                    class="flex flex-row items-center w-full px-4 py-2 mt-2 text-sm font-semibold text-left bg-transparent rounded-lg md:block hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline">
                    <span>Dropdown</span>
                    <svg fill="currentColor" viewBox="0 0 20 20"
                        class="inline w-4 h-4 mt-1 ml-1 transition-transform duration-200 transform md:-mt-1">
                        <path fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <div id="dropdown" class="absolute hidden right-0 w-full mt-2 origin-top-right rounded-md shadow-lg transition ease-in-out duration-700">
                    <div class="px-2 py-2 bg-white rounded-md shadow">
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">Link #1</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">Link #2</a>
                        <a class="block px-4 py-2 mt-2 text-sm font-semibold bg-transparent md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline"
                            href="#">Link #3</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
</div>