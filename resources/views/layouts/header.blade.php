<header class="bg-white" x-data="{ isOpen: false, categoryOpen: false }">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
        <!-- Logo -->
        <div class="flex lg:flex-1">
            <img class="h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Logo">
        </div>

        <!-- Navigation Items -->
        <div class="hidden lg:flex lg:gap-x-8 lg:flex-1 lg:justify-center">
            <a href="{{ url('/') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Home</a>

            <!-- Category Dropdown -->
            <div class="relative" x-data="{ open: false }" @click.away="open = false">
                <button @click="open = !open" class="flex items-center gap-x-1 text-sm font-semibold text-gray-900 hover:text-indigo-600">
                    Category
                    <svg class="w-4 h-4 mt-1" :class="{ 'rotate-180': open }" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd"/>
                    </svg>
                </button>

                <!-- Dropdown Content -->
                <div x-show="open" x-transition class="absolute top-full left-0 mt-3 w-64 bg-white rounded-lg shadow-xl py-2 z-50">
                    <div class="px-4 py-3 border-b">
                        <h3 class="text-xs font-semibold text-gray-500 uppercase">Filter By</h3>
                    </div>

                    <!-- Genre -->
        <div class="relative" x-data="{ isOpen: false }" @click.away = "isOpen=false">
          <button type="button"
                  @click="isOpen = !isOpen"
                  class="flex items-center gap-x-1 text-sm/6 font-semibold text-gray-900"
                  aria-expanded="false">
            Genre
            <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
              <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
            </svg>
          </button>
                            @foreach($genre as $g)
                                <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                                    <div class="flex-auto">
                                        <a href="{{ url('/filter/genre/'.$g->id_genre) }}" class="block font-semibold text-gray-900">
                                        {{ $g->nama_genre }}
                                            <span class="absolute inset-0"></span>
                                        </a>
                                    </div>
                                </div>
                            @endforeach
                        </div>


                    <!-- Tahun -->
                    <div class="relative" x-data="{ isOpen: false }" @click.away ="isOpen = false">
                        <button type="button"
                                @click="isOpen = !isOpen"
                                class="flex items-center gap-x-1 text-sm/6 font-semibold text-gray-900"
                                aria-expanded="false">
                          Tahun
                          <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                          </svg>
                        </button>
                            @foreach($tahun as $t)
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-2 text-sm/6 hover:bg-gray-50">
                              <div class="flex-auto">
                                <a href="{{ url('/filter/tahun/'.$t->id_tahun) }}" class="block font-semibold text-gray-900">
                                  {{ $t->tahun_rilis }}
                                  <span class="absolute inset-0"></span>
                                </a>
                              </div>
                            </div>
                          @endforeach
                        </div>


                    <!-- Negara -->
                    <div class="relative" x-data="{ isOpen: false }" @click.away ="isOpen = false">
                        <button type="button"
                                @click="isOpen = !isOpen"
                                class="flex items-center gap-x-1 text-sm/6 font-semibold text-gray-900"
                                aria-expanded="false">
                            Negara
                            <svg class="size-5 flex-none text-gray-400" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                <path fill-rule="evenodd" d="M5.22 8.22a.75.75 0 0 1 1.06 0L10 11.94l3.72-3.72a.75.75 0 1 1 1.06 1.06l-4.25 4.25a.75.75 0 0 1-1.06 0L5.22 9.28a.75.75 0 0 1 0-1.06Z" clip-rule="evenodd" />
                            </svg>
                        </button>
                            @foreach($negara as $n)
                            <div class="group relative flex items-center gap-x-6 rounded-lg p-4 text-sm/6 hover:bg-gray-50">
                                <div class="flex-auto">
                                    <a href="{{ url('/filter/negara/'.$n->id_negara) }}" class="block font-semibold text-gray-900">
                                        {{ $n->nama_negara }}
                                        <span class="absolute inset-0"></span>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                        </div>
                    </div>
                    </div>
                   <!-- Tambahkan About di sini -->
            <a href="{{ url('/about') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">
                About
            </a>
            </div>
        </div>

        <!-- Login/Register -->
        <div class="hidden lg:flex lg:flex-1 lg:justify-end">
            @if(auth()->check())
                <span class="text-sm font-semibold text-gray-900 mr-4">{{ auth()->user()->name }}</span>
                <a href="{{ url('/logout') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Logout</a>
            @else
                <a href="{{ url('/login') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Log in</a>
                <a href="{{ url('/register') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600 ml-4">Register</a>
            @endif
        </div>
    </nav>
</header>
