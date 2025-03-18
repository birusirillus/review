@extends('layouts.app')

@include('layouts.mobile-menu')

@section('content')
  <div class="relative justify-center flex mb-4 mt-4 sm:mb-8">
    <!-- Search Form -->
    <form action="{{ url('/search') }}" method="GET" class="w-1/2">
        <div class="relative">
            <input
                type="text"
                id="Search"
                name="search"
                placeholder="Search film..."
                class="w-full rounded-md border-2 border-gray-200 py-2 px-4 pr-10 text-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none transition-all"
                autocomplete="off"
            >
            <button type="submit" class="absolute right-3 top-1/2 -translate-y-1/2 text-gray-400 hover:text-indigo-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
            </button>
        </div>
    </form>
  </div>
  <!-- Panggil carousel disini -->

  <!-- Film List -->
  <div class="container mx-auto px-2 sm:px-4 py-4 sm:py-8">
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
      @foreach($films as $film)
        <a href="{{ url('/film/review/' . $film->id_film) }}" class="block group">
          <article class="relative overflow-hidden rounded-lg shadow-md transition-all duration-300 group-hover:-translate-y-1 group-hover:shadow-xl h-[250px] sm:h-[350px]">
            <!-- ... -->
          </article>
        </a>
      @endforeach
    </div>
  </div>
@endsection
