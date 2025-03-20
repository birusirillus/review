<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Film review</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css"  rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/star.css') }}">
  <link rel="stylesheet" href="{{ asset('css/star-rating.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<header class="bg-gray-100" x-data="{ isOpen: false, genreOpen: false, negaraOpen: false, tahunOpen: false }">
    <nav class="mx-auto flex max-w-7xl items-center justify-between p-6 lg:px-8" aria-label="Global">
      <div class="flex lg:flex-2">
        @if (auth()->check())
          @if (auth()->user()->profile)
            <a href="{{ url("custom_user/". $user->id_user) }}" class="-m-1.5 p-1.5">
                <img class="h-10 w-auto rounded-full" src="{{ asset('profile/' . $user->profile) }}" alt="">
            </a>
         @else
            <a href="{{ url("custom_user/". $user->id_user) }}" class="-m-1.5 p-1.5">
                <img class="h-10 w-auto rounded-full" src="{{ asset('images/profile.jpg') }}" alt="">
            </a>
        @endif
       @else
        <span class="sr-only">Your Company</span>
        <img class="h-20 max-w-[200px]" src="{{ asset('images/P.png') }}" alt="">
      @endif
        </div>
      <div class="ml-10">
        @if (auth()->check() && (auth()->user()->role == 'admin' || auth()->user()->role == 'author'))
        <a href="{{ url('/data_film') }}" class="text-sm/6 font-semibold text-gray-900 ">
            <span aria-hidden="true"></span>  Dashboard
        </a>
        @endif
    </div>
      <div class="hidden lg:flex lg:gap-x-4 w-4xl ml-7 mt-2">
        <a href="{{ url('/') }}" class="text-sm/6 font-semibold"><button type="button" class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">
                    Home</button></a>
      </div>
      <div class="hidden lg:flex lg:flex-1 lg:justify-end">
        @if(auth()->check())
            <span class="text-sm/6 font-semibold text-gray-900 mr-4">
                {{ auth()->user()->name }}
            </span>
            <a href="{{ url('/logout') }}" class="text-sm/6 font-semibold text-gray-900">
                Logout <span aria-hidden="true">&rarr;</span>
            </a>
        @else
            <a href="{{ url('/login') }}" class="text-sm/6 font-semibold text-gray-900">
                Log in <span aria-hidden="true">&rarr;</span>
            </a>
            <a href="{{ url('/register') }}" class="text-sm/6 font-semibold text-gray-900 ml-4">
                Register <span aria-hidden="true">&rarr;</span>
            </a>
        @endif
    </div>
    </nav>

    <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->
</div>

<div class="flex justify-center mt-16 px-8">
  <article class="flex bg-white transition hover:shadow-xl max-w-4xl w-full h-1000">
    <div class="rotate-180 p-2 [writing-mode:_vertical-lr]">
      <time
        datetime="2022-10-10"
        class="flex items-center justify-between gap-4 text-xs font-bold uppercase text-gray-900"
      >
        <span>{{ $films->tahun_rilis }}</span>
        <span class="w-px flex-1 bg-gray-900/10"></span>
        <span>{{ $films->tanggal_rilis }}</span>
      </time>
    </div>

    <div class="basis-32 sm:basis-56 h-full">
      <img
        alt="{{ $films->judul }}"
        src="{{ asset('gambar_film/' . $films->gambar_film) }}"
        class="aspect-[3/4] h-full w-full object-cover"/>
    </div>

    <!-- Bagian Informasi Film -->
    <div class="flex-1 flex-col justify-between">
      <div class="border-s border-gray-900/10 p-4 sm:border-l-transparent sm:p-6">
          <h3 class="font-bold uppercase text-gray-900">
            {{ $films->nama_film }}
          </h3>
          <p class="mt-2 text-sm/relaxed text-gray-700">
            <strong>Aktor Film:</strong>
            {{ $films->aktor_film }}
          </p>
        <p class="mt-2 text-sm/relaxed text-gray-700">
          <strong>Genre:</strong>
          @foreach($films->genreRelasi as $genre)
              {{ $genre->nama_genre }}
              @if(!$loop->last)
                  ,
              @endif
          @endforeach
        </p>
        <p class="mt-2 text-sm/relaxed text-gray-700">
          <strong>Tahun Rilis:</strong>
          {{ $films->tahunRelasi ? $films->tahunRelasi->tahun_rilis : 'Tahun tidak ditemukan' }}
        </p>
        <p class="mt-2 text-sm/relaxed text-gray-700">
          <strong>Negara:</strong>
          {{ $films->negaraRelasi ? $films->negaraRelasi->nama_negara : 'Negara tidak ditemukan' }}
        </p>
        <p class="mt-2 text-sm/relaxed text-gray-700">
          <strong>Sinopsis:</strong>
          {{ $films->deskripsi }}
        </p>
      </div>
    </div>
  </article>
<!-- Tombol Play Trailer -->
<div class="text-center">
    <button onclick="openTrailerModal('{{ $films->embed_trailer }}')" type="button" class="text-white bg-gradient-to-r from-cyan-500 to-blue-500
        hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-cyan-300 dark:focus:ring-cyan-800
        font-medium rounded-lg text-sm px-5 py-2.5 text-center">
        <i class="fa-solid fa-circle-play mr-2"></i> Play Trailer
    </button>
</div>

<!-- Modal -->
<div id="trailer-modal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-80 justify-center items-center z-[9999] hidden">
        <div class="bg-gray-800 p-8 rounded-lg shadow-lg w-11/12 max-w-3xl relative">
            <!-- Tombol Close -->
            <button onclick="closeTrailerModal()" class="absolute top-2 right-2 text-white text-2xl">&times;</button>

            <!-- Video Trailer -->
            <div class="relative w-full h-0 pb-[56.25%]">
                <iframe id="trailer-iframe" class="absolute top-0 left-0 w-full h-full rounded-lg" src="{{ asset('trailer_film/' . $films->trailer) }}" frameborder="0" allowfullscreen></iframe>
            </div>
        </div>
    </div>
</div>


<div class="border-t border-gray-200 mt-4 mb-4 pt-4 w-full">
  <h4 class="font-bold text-gray-900 mb-4 text-center" id="komentar">Komentar</h4>
  @php
  $totalReviews = $films->komentarRelasi->count();

  // Calculate counts for each star rating
  $fiveStars = $films->komentarRelasi->where('rating_user', 5)->count();
  $fourStars = $films->komentarRelasi->where('rating_user', 4)->count();
  $threeStars = $films->komentarRelasi->where('rating_user', 3)->count();
  $twoStars = $films->komentarRelasi->where('rating_user', 2)->count();
  $oneStar = $films->komentarRelasi->where('rating_user', 1)->count();

  // Calculate percentages
  $fiveStarPercent = $totalReviews > 0 ? ($fiveStars / $totalReviews) * 100 : 0;
  $fourStarPercent = $totalReviews > 0 ? ($fourStars / $totalReviews) * 100 : 0;
  $threeStarPercent = $totalReviews > 0 ? ($threeStars / $totalReviews) * 100 : 0;
  $twoStarPercent = $totalReviews > 0 ? ($twoStars / $totalReviews) * 100 : 0;
  $oneStarPercent = $totalReviews > 0 ? ($oneStar / $totalReviews) * 100 : 0;

  // Calculate average rating
  $averageRating = $totalReviews > 0 ? $films->komentarRelasi->avg('rating_user') : 0;
@endphp

@if(auth()->check())
    @php
        $hasCommented = $films->komentarRelasi->where('id_user', auth()->user()->id_user)->count() > 0;
    @endphp

    @if(!$hasCommented)
        <form action="{{ url('/tambah-komentar' ) }}" method="POST" class="mb-6">
            @csrf
            <div class="flex justify-center items-center mb-4">
    <select id="glsr-ltr" class="star-rating hidden" name="rating_user" required>
        <option value="">Pilih Rating</option>
        <option value="5">Baguss Banget</option>
        <option value="4">Baguss</option>
        <option value="3">Ya, Lumayan</option>
        <option value="2">Jelek</option>
        <option value="1">Ga Banget</option>
    </select>
    <div class="star-container flex space-x-1 text-gray-400 cursor-pointer">
        <svg class="star w-8 h-8 transition-all duration-200" data-value="1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
        <svg class="star w-8 h-8 transition-all duration-200" data-value="2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
        <svg class="star w-8 h-8 transition-all duration-200" data-value="3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
        <svg class="star w-8 h-8 transition-all duration-200" data-value="4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
        <svg class="star w-8 h-8 transition-all duration-200" data-value="5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M287.9 0c9.2 0 17.6 5.2 21.6 13.5l68.6 141.3 153.2 22.6c9 1.3 16.5 7.6 19.3 16.3s.5 18.1-5.9 24.5L433.6 328.4l26.2 155.6c1.5 9-2.2 18.1-9.7 23.5s-17.3 6-25.3 1.7l-137-73.2L151 509.1c-8.1 4.3-17.9 3.7-25.3-1.7s-11.2-14.5-9.7-23.5l26.2-155.6L31.1 218.2c-6.5-6.4-8.7-15.9-5.9-24.5s10.3-14.9 19.3-16.3l153.2-22.6L266.3 13.5C270.4 5.2 278.7 0 287.9 0zm0 79L235.4 187.2c-3.5 7.1-10.2 12.1-18.1 13.3L99 217.9 184.9 303c5.5 5.5 8.1 13.3 6.8 21L171.4 443.7l105.2-56.2c7.1-3.8 15.6-3.8 22.6 0l105.2 56.2L384.2 324.1c-1.3-7.7 1.2-15.5 6.8-21l85.9-85.1L358.6 200.5c-7.8-1.2-14.6-6.1-18.1-13.3L287.9 79z"/></svg>
    </div>
</div>
<input type="hidden" name="id_film" value="{{ $films->id_film }}">
<div class="flex flex-col space-y-4 pr-20 pl-20">
    <textarea
        name="komentar"
        rows="3"
        class="w-full mx-auto rounded-lg border-gray-400 p-3 text-sm"
        placeholder="Tulis komentar Anda..."></textarea>
    <button
        type="submit"
        class="self-end rounded bg-indigo-600 px-4 py-2 text-sm font-medium text-white hover:bg-indigo-700"
    >
        Kirim
    </button>
</div>
        </form>
    @else
        <p class="text-center text-gray-500 mb-4">Anda sudah memberikan komentar untuk film ini</p>
    @endif
@else
<p class="text-center text-gray-500 mb-4">
    <a href="{{ url('/login') }}" class="text-indigo-600 hover:underline">Login</a>
    untuk memberikan komentar
</p>
@endif



  <div class="flex justify-center items-center mb-4">
    @for ($i = 1; $i <= 5; $i++)
    @if ($i <= round($averageRating))
        <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
    @else
        <svg class="w-4 h-4 text-gray-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
            <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
        </svg>
    @endif
    @endfor
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($averageRating, 2) }}</p>
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">out of</p>
        <p class="ms-1 text-sm font-medium text-gray-500 dark:text-gray-400">5</p>
      </div>
          <p class="text-center font-medium text-gray-500 dark:text-gray-400"><strong>{{ $films->komentarRelasi->count() }} total review</strong></p>
          <div class="flex justify-center items-center mt-4">
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: {{ number_format($fiveStarPercent, 1) }}%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($fiveStarPercent, 1) }}%</span>
        </div>

        <div class="flex justify-center items-center mt-4">
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: {{ number_format($fourStarPercent, 1) }}%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($fourStarPercent, 1) }}%</span>
        </div>

        <div class="flex justify-center items-center mt-4">
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: {{ number_format($threeStarPercent, 1) }}%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($threeStarPercent, 1) }}%</span>
        </div>

        <div class="flex justify-center items-center mt-4">
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: {{ number_format($twoStarPercent, 1) }}%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($twoStarPercent, 1) }}%</span>
        </div>

        <div class="flex justify-center items-center mt-4 mb-10">
            <div class="w-2/4 h-5 mx-4 bg-gray-200 rounded dark:bg-gray-700">
                <div class="h-5 bg-yellow-300 rounded" style="width: {{ number_format($oneStarPercent, 1) }}%"></div>
            </div>
            <span class="text-sm font-medium text-gray-500 dark:text-gray-400">{{ number_format($oneStarPercent, 1) }}%</span>
        </div>


      <!-- Daftar Komentar -->
      <section>
  <div class="space-y-4">
    @foreach($komentar as $k)
      <div class="flex gap-4 border-b border-gray-100 pb-4 hover:bg-gray-50 transition duration-200 bg-gray-200">
          @if ($k->user)
              @if ($k->user->profile)
                  <img class="h-10 w-auto rounded-full" src="{{ asset('profile/' . $k->user->profile) }}" alt="">
              @else
                  <img class="h-10 w-auto rounded-full" src="{{ asset('images/profile.jpg') }}" alt="">
              @endif
          @else
              <img class="h-10 w-auto rounded-full" src="{{ asset('images/profile.jpg') }}" alt="">
          @endif
        <div class="flex-1">
          <div class="flex items-center gap-2 mb-1">
            <strong class="text-gray-900 text-sm">{{ $k->user->name }}</strong>
            <span class="text-gray-500 text-xs">
              {{ $k->created_at->diffForHumans() }}
            </span>
          </div>
          <div class="flex items-center mb-2">
            @for($i = 1; $i <= 5; $i++)
                @if($i <= $k->rating_user)
                    <svg class="w-4 h-4 text-yellow-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @else
                    <svg class="w-4 h-4 text-gray-300 me-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 22 20">
                        <path d="M20.924 7.625a1.523 1.523 0 0 0-1.238-1.044l-5.051-.734-2.259-4.577a1.534 1.534 0 0 0-2.752 0L7.365 5.847l-5.051.734A1.535 1.535 0 0 0 1.463 9.2l3.656 3.563-.863 5.031a1.532 1.532 0 0 0 2.226 1.616L11 17.033l4.518 2.375a1.534 1.534 0 0 0 2.226-1.617l-.863-5.03L20.537 9.2a1.523 1.523 0 0 0 .387-1.575Z"/>
                    </svg>
                @endif
            @endfor
            <span class="text-sm text-gray-500 ml-1">({{ $k->rating_user }}/5)</span>
        </div>
          <p class="text-gray-700 text-sm" id="comment-{{ $k->id_komentar }}">
            {{ $k->komentar }}
          </p>
          @if(auth()->check() && auth()->user()->id_user == $k->id_user)
            <div class="flex items-center mt-2">
              <button type="button" class="text-blue-600" onclick="toggleEdit('{{ $k->id_komentar }}')">Edit</button>
              <form action="{{ url('delete-komentar/'.$k->id_komentar . '/' . $films->id_film) }}" method="POST" class="ml-2">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600">Hapus</button>
              </form>
            </div>
            <form action="{{ url('edit-komentar/'.$k->id_komentar . '/'.$films->id_film) }}" method="POST" class="mt-2 hidden" id="edit-form-{{ $k->id_komentar }}">
              @csrf
              <input type="text" name="komentar" value="{{ $k->komentar }}" class="border rounded p-1" required>
              <button type="submit" class="ml-2 text-blue-600">Simpan</button>
            </form>
          @endif
        </div>
    </section>
      </div>
    @endforeach
  </div>
</div>

</header>
  <!--
  Heads up! 👋

  Plugins:
    - @tailwindcss/forms
-->

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
<script src="{{ asset('js/star-rating.min.js') }}"></script>
</body>
</html>

<script>
function toggleEdit(commentId) {
    const commentElement = document.getElementById('comment-' + commentId);
    const editFormElement = document.getElementById('edit-form-' + commentId);

    if (editFormElement) {
        editFormElement.classList.toggle('hidden');
    }
}
document.addEventListener("DOMContentLoaded", function() {
    const stars = document.querySelectorAll(".star");
    let selectedValue = 0;

    stars.forEach(star => {
        star.addEventListener("mouseover", function() {
            let value = this.getAttribute("data-value");
            stars.forEach(s => {
                if (s.getAttribute("data-value") <= value) {
                    s.style.color = "yellow";
                } else {
                    s.style.color = "gray";
                }
            });
        });

        star.addEventListener("mouseout", function() {
            stars.forEach(s => {
                if (s.getAttribute("data-value") > selectedValue) {
                    s.style.color = "gray";
                }
            });
        });

        star.addEventListener("click", function() {
            selectedValue = this.getAttribute("data-value");
            document.getElementById("glsr-ltr").value = selectedValue;
            stars.forEach(s => {
                if (s.getAttribute("data-value") <= selectedValue) {
                    s.style.color = "yellow";
                }
            });
        });
    });
});
    function openTrailerModal(embedUrl) {
    let modal = document.getElementById('trailer-modal');
    let iframe = document.getElementById('trailer-iframe');

    iframe.src = embedUrl;
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    modal.classList.remove('hidden');  // Hapus hidden saat modal muncul
}

function closeTrailerModal() {
    let modal = document.getElementById('trailer-modal');
    let iframe = document.getElementById('trailer-iframe');

    modal.classList.add('hidden');
    modal.classList.remove('flex');  // Hapus flex saat modal disembunyikan
    modal.classList.add('hidden');
    modal.classList.remove('flex');  // Hapus flex saat modal disembunyikan
}
</script>
