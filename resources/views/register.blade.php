<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>READIFY - Register</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Cinzel:wght@700&display=swap');
    .font-cinzel {
      font-family: 'Cinzel', serif;
    }
    input {
      font-size: 0.875rem; /* Tailwind text-sm */
      padding-top: 0.35rem; /* Kurangi padding atas supaya label dan placeholder lebih rapat */
      padding-bottom: 0.35rem;
    }
  </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md flex flex-col items-center">
    <!-- Logo -->
    <h1 class="font-cinzel text-[#2d4fb1] text-3xl font-bold mb-6 select-none">READIFY</h1>

    <!-- Form Register -->
    <form class="w-full flex flex-col gap-5" onsubmit="event.preventDefault(); window.location.href='/login';">
      <h2 class="text-[#2c2c2c] text-xl font-semibold mb-4 text-center">Register</h2>

      <!-- Nama -->
      <label for="name" class="text-sm font-medium text-[#2c2c2c]">Nama</label>
      <input
        type="text"
        id="name"
        name="name"
        placeholder="Masukkan nama"
        required
        class="h-10 border border-[#a1a0a0] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
      />

      <!-- Email -->
      <label for="email" class="text-sm font-medium text-[#2c2c2c]">Email</label>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="Masukkan email"
        required
        class="h-10 border border-[#a1a0a0] rounded px-3 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
      />

      <!-- Password dengan icon toggle -->
      <label for="password" class="text-sm font-medium text-[#2c2c2c]">Password</label>
      <div class="relative">
        <input
          type="password"
          id="password"
          name="password"
          placeholder="Masukkan password"
          required
          class="h-10 w-full border border-[#a1a0a0] rounded px-3 pr-10 focus:outline-none focus:ring-2 focus:ring-[#2d4fb1]"
        />
        <!-- Icon toggle mata -->
        <button
          type="button"
          id="togglePassword"
          aria-label="Toggle Password Visibility"
          class="absolute right-2 top-1/2 -translate-y-1/2 text-[#2d4fb1] hover:text-[#24438a] focus:outline-none"
        >
          <!-- Icon mata terbuka (default hidden) -->
          <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor" class="hidden">
            <path d="M11.5 18c4 0 7.46-2.22 9.24-5.5C18.96 9.22 15.5 7 11.5 7s-7.46 2.22-9.24 5.5C4.04 15.78 7.5 18 11.5 18m0-12c4.56 0 8.5 2.65 10.36 6.5C20 16.35 16.06 19 11.5 19S3 16.35 1.14 12.5C3 8.65 6.94 6 11.5 6m0 2C14 8 16 10 16 12.5S14 17 11.5 17S7 15 7 12.5S9 8 11.5 8m0 1A3.5 3.5 0 0 0 8 12.5a3.5 3.5 0 0 0 3.5 3.5a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 11.5 9"/>
          </svg>

          <!-- Icon mata tertutup (default visible) -->
          <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
            <path d="M2.54 4.71L3.25 4L20 20.75l-.71.71l-3.34-3.35c-1.37.57-2.87.89-4.45.89c-4.56 0-8.5-2.65-10.36-6.5c.97-2 2.49-3.67 4.36-4.82zM11.5 18c1.29 0 2.53-.23 3.67-.66l-1.12-1.13c-.73.5-1.6.79-2.55.79C9 17 7 15 7 12.5c0-.95.29-1.82.79-2.55L6.24 8.41a10.64 10.64 0 0 0-3.98 4.09C4.04 15.78 7.5 18 11.5 18m9.24-5.5C18.96 9.22 15.5 7 11.5 7c-1.15 0-2.27.19-3.31.53l-.78-.78C8.68 6.26 10.06 6 11.5 6c4.56 0 8.5 2.65 10.36 6.5a11.47 11.47 0 0 1-4.07 4.63l-.72-.73c1.53-.96 2.8-2.3 3.67-3.9M11.5 8C14 8 16 10 16 12.5c0 .82-.22 1.58-.6 2.24l-.74-.74c.22-.46.34-.96.34-1.5A3.5 3.5 0 0 0 11.5 9c-.54 0-1.04.12-1.5.34l-.74-.74c.66-.38 1.42-.6 2.24-.6M8 12.5a3.5 3.5 0 0 0 3.5 3.5c.67 0 1.29-.19 1.82-.5L8.5 10.68c-.31.53-.5 1.15-.5 1.82"/>
          </svg>
        </button>
      </div>

      <button
        type="submit"
        class="bg-[#2d4fb1] text-white font-semibold py-3 rounded hover:bg-[#24438a] transition"
      >
        Register
      </button>
    </form>

    <p class="mt-6 text-[#a1a0a0] text-center text-sm">
      Kamu sudah punya akun?
      <a href="/login" class="text-[#2d4fb1] font-semibold hover:underline">Masuk</a>
    </p>
  </div>

  <script>
    const togglePasswordBtn = document.getElementById('togglePassword');
    const passwordInput = document.getElementById('password');
    const eyeOpenIcon = document.getElementById('eyeOpen');
    const eyeClosedIcon = document.getElementById('eyeClosed');

    togglePasswordBtn.addEventListener('click', () => {
      const isPassword = passwordInput.type === 'password';
      passwordInput.type = isPassword ? 'text' : 'password';

      if (isPassword) {
        eyeOpenIcon.classList.remove('hidden');
        eyeClosedIcon.classList.add('hidden');
      } else {
        eyeOpenIcon.classList.add('hidden');
        eyeClosedIcon.classList.remove('hidden');
      }
    });
  </script>
</body>
</html>