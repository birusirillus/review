<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>

    @if(session('error'))
        <div role="alert" class="rounded border-s-4 border-red-500 bg-red-50 p-4">
            <strong class="block font-medium text-red-800">Salah, ulangi kembali</strong>
            <p class="mt-2 text-sm text-red-700">{{ session('error') }}</p>
        </div>
    @endif

    <div class="flex min-h-full flex-col justify-center px-6 py-12 lg:px-8">
        <div class="sm:mx-auto sm:w-full sm:max-w-sm">
          <img class="mx-auto h-20 max-w-[200px]" src="{{ asset('images/P.png') }}" alt="Your Company">
          <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-gray-900">Register to your account</h2>
        </div>

        <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
          <form class="space-y-6" action="{{ url('registerPost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div>
              <label for="email" class="block text-sm/6 font-medium text-gray-900">Nama Lengkap</label>
              <div class="mt-2">
                <input type="text" name="name" id="email" autocomplete="name" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300 placeholder:text-gray-400  focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div>
              <label for="email" class="block text-sm/6 font-medium text-gray-900">Umur</label>
              <div class="mt-2">
                <select name="usia" id="usia" class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline  -outline-offset-1 outline-gray-300 placeholder:text-gray-400  focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6" required>
                  <option value="">Pilih Usia Anda</option>
                  <option value="anak">6-18</option>
                  <option value="dewasa">18+</option>
                </select>
              </div>
            </div>

            <div>
              <label for="email" class="block text-sm/6 font-medium text-gray-900">Email address</label>
              <div class="mt-2">
                <input type="email" name="email" id="email" autocomplete="email" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div>
              <div class="flex items-center justify-between">
                <label for="password" class="block text-sm/6 font-medium text-gray-900">Password</label>
              </div>
              <div class="mt-2">
                <input type="password" name="password" id="password" autocomplete="current-password" required class="block w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline -outline-offset-1 outline-gray-300 placeholder:text-gray-400  focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
              </div>
            </div>

            <div>
              <button type="submit" class="flex w-full justify-center rounded-md bg-indigo-600 px-3 py-1.5 text-sm/6 font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Register</button>
            </div>
          </form>

          <p class="mt-10 text-center text-sm/6 text-gray-500">
            Sudah punya akun?
            <a href="{{ url('/login') }}" class="font-semibold text-indigo-600 hover:text-indigo-500">Login sekarang!</a>
          </p>
        </div>
      </div>
      <script>
        document.addEventListener('DOMContentLoaded', function() {
            const dismissButton = document.querySelector('[class="text-gray-500 transition hover:text-gray-600"]');
            const alert = dismissButton?.closest('[role="alert"]');

            if (dismissButton && alert) {
                dismissButton.addEventListener('click', () => {
                    alert.remove();
                });
            }
        });
    </script>

</body>
</html>
