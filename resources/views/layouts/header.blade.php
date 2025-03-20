<header class="bg-white" x-data="{ isOpen: false, categoryOpen: false }">
    <nav class="mx-auto flex max-w-4x1 items-center justify-between p-6 lg:px-8" aria-label="Global">
          <div class="flex lg:flex-1">
            @if (auth()->check() && in_array(auth()->user()->role, ['admin', 'author']))
                <a href="{{ url('/data_film') }}" class="text-sm/6 font-semibold text-gray-900 ">
                 <span aria-hidden="true">&larr;</span> Dashboard
                </a>
            @endif
          </div>
        <!-- Navigation Items -->
        <div class="hidden lg:flex lg:gap-x-1 lg:flex-1 lg:justify-center">
            <a href="{{ url('/') }}" class="text-sm font-semibold text-gray-900 hover:text-indigo-600">Home</a>
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

<script>
    document.getElementById('toggleFilter').addEventListener('click', function() {
        let form = document.getElementById('filterForm');
        form.classList.toggle('hidden');
    });
</script>
