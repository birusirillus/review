<!--
  This example requires updating your template:

  ```
  <html class="h-full bg-white">
  <body class="h-full">
  ```
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit Film</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@extends('admin.sidebar')
<body>
  @section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Edit Film {{ $film->nama_film }}</h2>
        </div>
      
        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="{{ url('edit/film/proses') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id_film" value="{{ $film->id_film }}">
            <div>
              <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama Film</label>
              <div class="mt-2">
                <input type="text" name="name" id="name" autocomplete="name" value="{{ $film->nama_film }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" >
              </div>
            </div>

            <div>
              <label for="deskripsi" class="block text-sm font-medium text-gray-700"> Sinopsis Film </label>

              <textarea
                name="deskripsi"
                id="deskripsi"
                class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
                rows="4" required>{{ $film->deskripsi }}</textarea>
            </div>

            <div>
              <label for="name" class="block text-sm/6 font-medium text-gray-900">Durasi Film (menit)</label>
              <div class="mt-2">
                <input type="number" name="durasi" value="{{ $film->durasi }}" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="genre" class="block text-sm/6 font-medium text-gray-900">Genre</label>
              </div>
              <div class="mt-2">
                  <select name="genre[]" id="genre" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" multiple required>
                      @foreach ($genre as $g)
                          <option value="{{ $g->id_genre }}" {{ $film->genreRelasi->contains('id_genre', $g->id_genre) ? 'selected' : '' }}>
                              {{ $g->nama_genre }}
                          </option>
                      @endforeach
                  </select>
              </div>
          </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="tahun" class="block text-sm/6 font-medium text-gray-900">Tahun</label>
              </div>
              <div class="mt-2">
                <select name="tahun" id="tahun" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                  <option value="">pilih tahun rilis</option>
                  @foreach ($tahun as $t )
                  <option value="{{ $t->id_tahun }}"{{ $film->tahun ==  $t->id_tahun  ? 'selected' : '' }}>{{ $t->tahun_rilis }}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="negara" class="block text-sm/6 font-medium text-gray-900">Negara</label>
              </div>
              <div class="mt-2">
                    <select name="negara" id="negara" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                      <option value="">pilih negara</option>
                      @foreach ($negara as $n )
                        <option value="{{ $n->id_negara }}" {{ $film->negara == $n->id_negara ? 'selected' : '' }}>{{ $n->nama_negara }}</option>
                      @endforeach
                    </select>
                </div>
            </div>

            <div>
              <label for="email" class="block text-sm/6 font-medium text-gray-900">Umur</label>
              <div class="mt-2">
                <select name="usia" id="usia" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                  <option value="">Film Untuk Usia</option>
                  <option value="anak"{{ $film->for_usia == 'anak' ? 'selected' : "" }}>anak-anak</option>
                  <option value="remaja"{{ $film->for_usia == 'remaja' ? 'selected' : '' }}>remaja</option>
                  <option value="dewasa"{{ $film->for_usia == 'dewasa' ? 'selected' : '' }}>dewasa</option>
                </select>
              </div>
            </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="rating" class="block text-sm/6 font-medium text-gray-900">Rating Film</label>
              </div>
              <div class="mt-2">
                    <select name="rating" id="rating" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                      {{ $film->rating == '1' ? 'selected' : '' }}
                      <option value="">pilih rating bintang</option>
                      <option value="1"{{ $film->rating == '1' ? 'selected' : '' }}>1</option>
                      <option value="1.1"{{ $film->rating == '1.1' ? 'selected' : '' }}>1.1</option>
                      <option value="1.2"{{ $film->rating == '1.2' ? 'selected' : '' }}>1.2</option>
                      <option value="1.3"{{ $film->rating == '1.3' ? 'selected' : '' }}>1.3</option>
                      <option value="1.4"{{ $film->rating == '1.4' ? 'selected' : '' }}>1.4</option>
                      <option value="1.5"{{ $film->rating == '1.5' ? 'selected' : '' }}>1.5</option>
                      <option value="1.6"{{ $film->rating == '1.6' ? 'selected' : '' }}>1.6</option>
                      <option value="1.7"{{ $film->rating == '1.7' ? 'selected' : '' }}>1.7</option>
                      <option value="1.8"{{ $film->rating == '1.8' ? 'selected' : '' }}>1.8</option>
                      <option value="1.9"{{ $film->rating == '1.9' ? 'selected' : '' }}>1.9</option>
                      <option value="2"{{ $film->rating == '2' ? 'selected' : '' }}>2</option>
                      <option value="2.1"{{ $film->rating == '2.1' ? 'selected' : '' }}>2.1</option>
                      <option value="2.2"{{ $film->rating == '2.2' ? 'selected' : '' }}>2.2</option>
                      <option value="2.3"{{ $film->rating == '2.3' ? 'selected' : '' }}>2.3</option>
                      <option value="2.4"{{ $film->rating == '2.4' ? 'selected' : '' }}>2.4</option>
                      <option value="2.5"{{ $film->rating == '2.5' ? 'selected' : '' }}>2.5</option>
                      <option value="2.6"{{ $film->rating == '2.6' ? 'selected' : '' }}>2.6</option>
                      <option value="2.7"{{ $film->rating == '2.7' ? 'selected' : '' }}>2.7</option>
                      <option value="2.8"{{ $film->rating == '2.8' ? 'selected' : '' }}>2.8</option>
                      <option value="2.9"{{ $film->rating == '2.9' ? 'selected' : '' }}>2.9</option>
                      <option value="3"{{ $film->rating == '3' ? 'selected' : '' }}>3</option>
                      <option value="3.1"{{ $film->rating == '3.1' ? 'selected' : '' }}>3.1</option>
                      <option value="3.2"{{ $film->rating == '3.2' ? 'selected' : '' }}>3.2</option>
                      <option value="3.3"{{ $film->rating == '3.3' ? 'selected' : '' }}>3.3</option>
                      <option value="3.4"{{ $film->rating == '3.4' ? 'selected' : '' }}>3.4</option>
                      <option value="3.5"{{ $film->rating == '3.5' ? 'selected' : '' }}>3.5</option>
                      <option value="3.6"{{ $film->rating == '3.6' ? 'selected' : '' }}>3.6</option>
                      <option value="3.7"{{ $film->rating == '3.7' ? 'selected' : '' }}>3.7</option>
                      <option value="3.8"{{ $film->rating == '3.8' ? 'selected' : '' }}>3.8</option>
                      <option value="3.9"{{ $film->rating == '3.9' ? 'selected' : '' }}>3.9</option>
                      <option value="4"{{ $film->rating == '4' ? 'selected' : '' }}>4</option>
                      <option value="4.1"{{ $film->rating == '4.1' ? 'selected' : '' }}>4.1</option>
                      <option value="4.2"{{ $film->rating == '4.2' ? 'selected' : '' }}>4.2</option>
                      <option value="4.3"{{ $film->rating == '4.3' ? 'selected' : '' }}>4.3</option>
                      <option value="4.4"{{ $film->rating == '4.4' ? 'selected' : '' }}>4.4</option>
                      <option value="4.5"{{ $film->rating == '4.5' ? 'selected' : '' }}>4.5</option>
                      <option value="4.6"{{ $film->rating == '4.6' ? 'selected' : '' }}>4.6</option>
                      <option value="4.7"{{ $film->rating == '4.7' ? 'selected' : '' }}>4.7</option>
                      <option value="4.8"{{ $film->rating == '4.8' ? 'selected' : '' }}>4.8</option>
                      <option value="4.9"{{ $film->rating == '4.9' ? 'selected' : '' }}>4.9</option>.
                      <option value="5"{{ $film->rating == '5' ? 'selected' : '' }}>5</option>
                    </select>
                </div>
            </div>
      
            <div>
              <label for="gambar" class="block text-sm/6 font-medium text-gray-900">Gambar Film</label>
              <div class="mt-2">
                <input type="file" name="gambar" id="gambar" autocomplete="gambar" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div>
              <label for="gambar" class="block text-sm/6 font-medium text-gray-900">Trailer Film</label>
              <div class="mt-2">
                <input type="file" name="trailer" id="trailer" autocomplete="trailer" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Simpan</button>
            </div>
          </form>
        </div>
      </div>
  @endsection
</body>
</html>