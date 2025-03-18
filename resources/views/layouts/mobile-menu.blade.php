<div class="lg:hidden" role="dialog" aria-modal="true">
    <div class="fixed inset-0 z-10" x-show="isOpen"></div>
    <div x-show="isOpen" x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95" x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95" class="fixed inset-y-0 right-0 z-20 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
      <div class="flex items-center justify-between">
        <!-- ... -->
      </div>
      <div class="mt-6 flow-root">
        <div class="-my-6 divide-y divide-gray-500/10">
          <div class="space-y-2 py-6">
            <a href="{{ url('/') }}" class="-mx-3 block rounded-lg px-3 py-2 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Home</a>
          </div>
          <div class="py-6">
            @if(auth()->check())
              <span class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900">{{ auth()->user()->name }}</span>
              <a href="{{ url('/logout') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Logout</a>
            @else
              <a href="{{ url('/login_film') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Log in</a>
              <a href="{{ url('/register') }}" class="-mx-3 block rounded-lg px-3 py-2.5 text-base/7 font-semibold text-gray-900 hover:bg-gray-50">Register</a>
            @endif
          </div>
        </div>
      </div>
    </div>
  </div>
