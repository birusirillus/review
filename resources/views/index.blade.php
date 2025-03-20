@extends('layouts.app')

@include('layouts.mobile-menu')

@section('content')
 <!-- Search Input -->
<div class="relative justify-center flex mb-4 mt-4 sm:mb-8">
    <input
        type="text"
        id="searchInput"
        name="search"
        placeholder="Search film..."
        class="w-1/2 rounded-md border-2 border-gray-200 py-2 px-4 pr-10 text-gray-700 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 focus:outline-none transition-all"
        autocomplete="off">

    <button type="button" id="toggleFilter" class="ml-2 bg-blue-500 text-white px-4 py-2 rounded">
        Search
    </button>
</div>

<!-- Form Filter -->
<div id="filterForm" class="hidden absolute bg-white p-4 shadow rounded w-64 mt-2 z-50">
    <form action="{{ route('search') }}" method="GET">
        <label class="block font-semibold">Genre</label>
        <select name="genres[]" multiple class="border p-2 rounded w-full">
            @if(isset($genres) && count($genres) > 0)
            @foreach($genres as $genre)
                <option value="{{ $genre->nama_genre }}">{{ $genre->nama_genre }}</option>
            @endforeach
            @else
             <option disabled>Data Genre Tidak Tersedia</option>
            @endif
        </select>

        <label class="block mt-4 font-semibold">Tahun</label>
        <select name="years[]" multiple class="border p-2 rounded w-full">
            @if(isset($years) && count($years) > 0)
            @foreach($years as $year)
                <option value="{{ $year->tahun_rilis }}">{{ $year->tahun_rilis }}</option>
            @endforeach
            @else
              <option disabled>Data Tahun Tidak Tersedia</option>
            @endif
        </select>

        <label class="block mt-4 font-semibold">Negara</label>
        <select name="countries[]" multiple class="border p-2 rounded w-full">
            @if(isset($countries) && count($countries) > 0)
            @foreach($countries as $country)
                <option value="{{ $country->nama_negara }}">{{ $country->nama_negara }}</option>
            @endforeach
            @else
                <option disabled>Data Negara Tidak Tersedia</option>
            @endif
        </select>

        <button type="submit" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded w-full">
            Cari Film
        </button>
    </form>
</div>



  <div class="relative ml-10 mt-10">
    <p class="text-6xl text-white dark:text-white">NOW SHOWING IN CINEMAS</p>
  </div>

  <!-- Film List -->
  <div class="container mx-auto px-2 sm:px-4 py-4 sm:py-8 sm:mt-8">
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3 sm:gap-6">
        @if(isset($films) && count($films) > 0)
        @foreach($films as $film)
        <a href="{{ url('/film/review/' . $film->id_film) }}" class="block group">
            <article class="relative overflow-hidden rounded-lg shadow-md transition-all duration-300 group-hover:-translate-y-1 group-hover:shadow-xl h-[250px] sm:h-[350px]">
                <img src="{{ asset('images/' . $film->gambar_film) }}" alt="Sampul Film"
                    class="absolute inset-0 w-full h-full object-cover">

                <div class="absolute inset-0 bg-black bg-opacity-40 transition-opacity group-hover:bg-opacity-20"></div>

                <div class="absolute bottom-0 left-0 p-4 text-white">
                    <h3 class="text-lg font-semibold">{{ $film->nama_film }}</h3>
                </div>

                <div class="absolute top-2 right-2 bg-yellow-400 text-black text-sm font-bold px-2 py-1 rounded">
                    ⭐ {{ number_format($film->rating, 1) }}
                </div>
            </article>
        </a>
        @endforeach
        @else
            <option disabled>Data Tidak Tersedia</option>
        @endif
    </div>
  </div>

  <div class="text-center text-white mt-6 mb-6">
    <h2 class="text-xl font-semibold mb-4">Cari genre menarik untuk kamu</h2>
    <div class="flex flex-wrap justify-center gap-3">
        @if(isset($genres) && count($genres) > 0)
        @foreach($genres as $genre)
            <a href="{{ route('genre.filter', $genre->nama_genre) }}"
                class="px-4 py-2 bg-blue-600 text-white rounded-full hover:bg-blue-800 transition">
                {{ $genre->nama_genre }}
            </a>
        @endforeach
            @else
             <option disabled>Data Genre Tidak Tersedia</option>
            @endif
    </div>
</div>

@endsection

@section('scripts')
<script>
    document.addEventListener("DOMContentLoaded", function () {
        var toggleButton = document.getElementById("toggleFilter");
        var filterForm = document.getElementById("filterForm");

        // Toggle form filter saat tombol Search diklik
        toggleButton.addEventListener("click", function () {
            filterForm.classList.toggle("hidden");
        });

        // Menutup form filter jika klik di luar area form
        document.addEventListener("click", function (event) {
            if (!filterForm.contains(event.target) && !toggleButton.contains(event.target)) {
                filterForm.classList.add("hidden");
            }
        });
    });
</script>
@endsection

