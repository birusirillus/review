<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tentang FilmDB - Film DireviewBos</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-50">
    <!-- Main Content -->
    <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
        <!-- Hero Section -->
        <div class="text-center mb-16">
            <h1 class="text-4xl font-bold text-gray-900 mb-4">
                Selamat Datang di <span class="text-indigo-600">FilmDB</span>
            </h1>  
            <p class="text-xl text-gray-600">
                Platform Review Film No. 1 di Hatimu
            </p>
        </div>

        <!-- About Content -->
        <div class="space-y-16">
            <!-- Apa itu FilmDB? -->
            <section class="bg-white rounded-2xl shadow-lg p-8">
                <div class="flex items-center mb-6">
                    <div class="bg-indigo-100 p-3 rounded-lg">
                        <i class="fas fa-film text-indigo-600 text-2xl"></i>
                    </div>
                    <h2 class="ml-4 text-2xl font-bold text-gray-900">Apa itu FilmDB?</h2>
                </div>
                <p class="text-gray-600 leading-relaxed">
                    FilmDB (Film DireviewBos) adalah platform komunitas pecinta film Indonesia yang menyediakan:
                </p>
                <ul class="list-disc list-inside mt-4 space-y-2 text-gray-600">
                    <li>Database film terlengkap dengan berbagai genre</li>
                    <li>Review dan rating dari komunitas</li>
                    <li>Rekomendasi film berdasarkan preferensi</li>
                    <li>Berita terbaru seputar dunia perfilman</li>
                    <li>Forum diskusi antar pecinta film</li>
                </ul>
            </section>

            <!-- Fitur Unggulan -->
            <section class="bg-indigo-50 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Fitur Unggulan</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <i class="fas fa-star text-yellow-400 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Rating Film</h3>
                        <p class="text-gray-600">Beri rating dan baca review dari jutaan anggota komunitas</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <i class="fas fa-calendar-alt text-purple-500 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Jadwal Rilis</h3>
                        <p class="text-gray-600">Pantau jadwal rilis film bioskop terbaru</p>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-md">
                        <i class="fas fa-users text-blue-500 text-3xl mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2">Komunitas Aktif</h3>
                        <p class="text-gray-600">Diskusikan film favorit dengan sesama movie lovers</p>
                    </div>
                </div>
            </section>

            <!-- Kenapa Pilih FilmDB? -->
            <section class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Kenapa Pilih FilmDB?</h2>
                <div class="grid gap-6 md:grid-cols-2">
                    <div class="flex items-start">
                        <div class="bg-green-100 p-2 rounded-lg mr-4">
                            <i class="fas fa-check text-green-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Update Terkini</h3>
                            <p class="text-gray-600 mt-1">Informasi film selalu diperbarui secara real-time</p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="bg-blue-100 p-2 rounded-lg mr-4">
                            <i class="fas fa-mobile-alt text-blue-600"></i>
                        </div>
                        <div>
                            <h3 class="text-lg font-semibold">Responsive Design</h3>
                            <p class="text-gray-600 mt-1">Akses nyaman dari desktop maupun mobile</p>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Tim Kami -->
            <section class="bg-indigo-50 rounded-2xl p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Tim Kami</h2>
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center">
                        <img src="..\images\blue.jpeg"
                             class="w-32 h-32 rounded-full mx-auto mb-4 shadow-lg"
                             alt="CEO">
                        <h3 class="font-semibold">Biruuu Langit</h3>
                        <p class="text-gray-600">CEO</p>
                    </div>

                    <div class="text-center">
                        <img src="..\images\blue.jpeg"
                             class="w-32 h-32 rounded-full mx-auto mb-4 shadow-lg"
                             alt="Editor">
                        <h3 class="font-semibold">Biruuu Langit</h3>
                        <p class="text-gray-600">Pembuat Aksara</p>
                    </div>

                    <div class="text-center">
                        <img src="..\images\blue.jpeg"
                             class="w-32 h-32 rounded-full mx-auto mb-4 shadow-lg"
                             alt="Developer">
                        <h3 class="font-semibold">Biruuu Langit</h3>
                        <p class="text-gray-600">Developer</p>
                    </div>
                </div>
            </section>

            <!-- Kontak -->
            <section class="bg-white rounded-2xl shadow-lg p-8">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">Keluh Kesah Disini</h2>
                <form class="max-w-lg mx-auto">
                    <div class="mb-4">
                        <input type="text"
                               placeholder="Nama Anda"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    </div>
                    <div class="mb-4">
                        <input type="email"
                               placeholder="Email Anda"
                               class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500">
                    </div>
                    <div class="mb-4">
                        <textarea
                            rows="4"
                            placeholder="Pesan Anda"
                            class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:ring-2 focus:ring-indigo-200 focus:border-indigo-500"></textarea>
                    </div>
                    <button class="w-full bg-indigo-600 text-white py-2 px-6 rounded-lg hover:bg-indigo-700 transition-colors">
                        Kirim Pesan
                    </button>
                </form>
            </section>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-8 mt-16">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <p>&copy; 2024 FilmDB - Film DireviewBos. All rights reserved.</p>
            <div class="mt-4 space-x-6">
                <a href="#" class="hover:text-indigo-400"><i class="fab fa-twitter"></i></a>
                <a href="#" class="hover:text-indigo-400"><i class="fab fa-facebook"></i></a>
                <a href="#" class="hover:text-indigo-400"><i class="fab fa-instagram"></i></a>
            </div>
        </div>
    </footer>
</body>
</html>
