<div class="container mx-auto p-4">
    <h1 class="text-2xl font-bold mb-4">Dashboard</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <!-- Total Genre -->
        <div class="bg-blue-500 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Genre</h2>
            <p class="text-3xl">{{ $totalGenres }}</p>
        </div>

        <!-- Total Tahun -->
        <div class="bg-green-500 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Tahun</h2>
            <p class="text-3xl">{{ $totalYears }}</p>
        </div>

        <!-- Total Film -->
        <div class="bg-red-500 text-white p-6 rounded-lg shadow-md">
            <h2 class="text-lg font-semibold">Total Film</h2>
            <p class="text-3xl">{{ $totalFilms }}</p>
        </div>
    </div>
</div>

