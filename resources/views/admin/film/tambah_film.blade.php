<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tambah film</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
@extends('admin.sidebar')
<body>
  @section('content')
    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Tambah Film</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="{{ url('tambah/film/proses') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
              <label for="name" class="block text-sm/6 font-medium text-gray-900">Nama Film</label>
              <div class="mt-2">
                <input type="text" name="name" id="name" autocomplete="name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline  focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div>
              <label for="aktor" class="block text-sm/6 font-medium text-gray-900">Aktor Film</label>
              <div class="mt-2">
                <input type="text" name="aktor" id="aktor" autocomplete="aktor" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline  focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div class="mb-4">
              <label for="deskripsi" class="block text-sm font-medium text-gray-700"> Sinopsis Film </label>
              <textarea
              name="deskripsi"
              id="deskripsi"
              class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline  -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"
              rows="4" required></textarea>
            </div>

            <div class="mb-4">
            <label for="name" class="block text-sm/6 font-medium text-gray-900">Durasi Film (menit)</label>
            <div class="mt-2">
              <input type="number" name="durasi" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline  -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline  focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
            </div>
          </div>
          <div class="mb-4">
              <div class="flex items-center justify-between">
                  <label for="genre" class="block text-sm/6 font-medium text-gray-900">Genre</label>
              </div>
              <div class="mt-2">
                  <select name="genre[]" id="genre" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline  -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline  focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" multiple required>
                      @foreach ($genre as $g)
                          <option value="{{ $g->id_genre }}">{{ $g->nama_genre }}</option>
                      @endforeach
                  </select>
              </div>
          </div>
            <div class="mb-4">
                <div class="flex items-center justify-between">
                  <label for="tahun" class="block text-sm/6 font-medium text-gray-900">Tahun</label>
                </div>
                <div class="mt-2">
                  <input type="number" name="tahun" id="tahun" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-gray-300 focus:outline-indigo-600 sm:text-sm/6"
                    min="2000" max="{{ date('Y') }}" step="1" placeholder="Pilih tahun rilis" required>
                </div>
              </div>


            <div>
              <label for="email" class="block text-sm/6 font-medium text-gray-900">Umur</label>
              <div class="mt-2">
                <select name="usia" id="usia" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                  <option value="">Film Untuk Usia</option>
                  <option value="anak">anak-anak</option>
                  <option value="dewasa">dewasa</option>
                </select>
              </div>
            </div>

            <div class="mb-4">
              <div class="flex items-center justify-between">
                <label for="negara" class="block text-sm/6 font-medium text-gray-900">Negara</label>
              </div>
              <div class="mt-2">
                    <select name="negara" id="negar" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline  -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                      <option value="">pilih negara</option>
                     @foreach ($negara as $n )
                      <option value="{{ $n->id_negara }}">{{ $n->nama_negara }}</option>
                     @endforeach
                    </select>
                </div>
            </div>

              <div class="mb-4">
                <label for="gambar" class="block text-sm/6 font-medium text-gray-900">Gambar Film</label>
                <div class="mt-2">
                    <input type="file" name="gambar" id="gambar" autocomplete="gambar" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline  -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline  focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                </div>
            </div>

            <div class="mb-4">
              <label for="trailer" class="block text-sm/6 font-medium text-gray-900">Trailer Film</label>
              <div class="mt-2">
                <input type="text" name="trailer" id="trailerLink" placeholder="Masukkan link trailer film" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <iframe id="trailerPreview" width="200" height="150" src="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="display: none;"></iframe>
             </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Tambah</button>
            </div>
          </form>
        </div>
      </div>
  @endsection
</body>

<script>
    document.getElementById('gambarLink').addEventListener('input', function() {
        var gambarPreview = document.getElementById('gambarPreview');
        var link = this.value.trim();

        // Ekstensi yang diperbolehkan
        var validExtensions = /\.(jpg|jpeg|png|gif|webp)$/i;

        if (link.match(validExtensions)) {
            gambarPreview.src = link;
            gambarPreview.style.display = 'block';
        } else {
            gambarPreview.style.display = 'none';
        }
    });

    function updateTrailerPreview() {
        let input = document.getElementById("trailerLink").value;
        let preview = document.getElementById("trailerPreview");
        let embedUrl = convertToEmbed(input);

        if (embedUrl) {
            preview.src = embedUrl;
            preview.style.display = "block";
        } else {
            preview.style.display = "none";
        }
    }

    function convertToEmbed(url) {
        let youtubePattern = /(?:https?:\/\/)?(?:www\.)?(?:youtube\.com\/watch\?v=|youtu\.be\/)([\w-]+)/;
        let match = url.match(youtubePattern);

        return match ? `https://www.youtube.com/embed/${match[1]}` : null;
    }
</script>


</html>
