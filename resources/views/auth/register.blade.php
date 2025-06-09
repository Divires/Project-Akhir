<!-- <!DOCTYPE html>
<html>
<head>
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>

    @if ($errors->any())
        <div style="color:red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <label>Name:</label><br>
        <input type="text" name="name" value="{{ old('name') }}"><br><br>

        <label>Email (optional):</label><br>
        <input type="email" name="email" value="{{ old('email') }}"><br><br>

        <label>Password:</label><br>
        <input type="password" name="password" required><br><br>

        <label>Confirm Password:</label><br>
        <input type="password" name="password_confirmation" required><br><br>

        <label>Role:</label><br>
        <select name="role" id="role-select" onchange="toggleRoleFields()">
            <option value="">-- Select Role --</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="student" {{ old('role') == 'student' ? 'selected' : '' }}>Student</option>
        </select><br><br>

        <div id="admin-fields" style="display: none;">
            <label>Position:</label><br>
            <input type="text" name="position" value="{{ old('position') }}"><br><br>
        </div>

        <div id="student-fields" style="display: none;">
            <label>NIS:</label><br>
            <input type="text" name="nis" value="{{ old('nis') }}"><br><br>

            <label>Class:</label><br>
            <input type="text" name="class" value="{{ old('class') }}"><br><br>
        </div>

        <button type="submit">Register</button>
    </form>

    <p>Belum punya akun? <a href="{{ route('login.form') }}">Masuk</a></p>


    <script>
        function toggleRoleFields() {
            var role = document.getElementById('role-select').value;
            document.getElementById('admin-fields').style.display = role === 'admin' ? 'block' : 'none';
            document.getElementById('student-fields').style.display = role === 'student' ? 'block' : 'none';
        }

        // Initialize on page load
        window.onload = toggleRoleFields;
    </script>
</body>
</html> -->

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
    input, select {
      font-size: 0.875rem;
      padding-top: 0.35rem;
      padding-bottom: 0.35rem;
    }
  </style>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen p-4">
  <div class="bg-white rounded-lg shadow-lg p-8 w-full max-w-md flex flex-col items-center">
    <h1 class="font-cinzel text-[#2d4fb1] text-3xl font-bold mb-6 select-none">READIFY</h1>

    <form method="POST" action="{{ route('register') }}" class="w-full flex flex-col gap-5">
      @csrf
      <h2 class="text-[#2c2c2c] text-xl font-semibold mb-4 text-center">Register</h2>

      <!-- Alert jika error -->
      @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-2 rounded">
          <ul class="text-sm list-disc pl-5">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <!-- Nama -->
      <label for="name" class="text-sm font-medium text-[#2c2c2c]">Nama</label>
      <input type="text" name="name" id="name" placeholder="Masukkan nama"
        class="h-10 border border-[#a1a0a0] rounded px-3 focus:ring-2 focus:ring-[#2d4fb1]" value="{{ old('name') }}" required />

      <!-- Email -->
      <label for="email" class="text-sm font-medium text-[#2c2c2c]">Email</label>
      <input type="email" name="email" id="email" placeholder="Masukkan email"
        class="h-10 border border-[#a1a0a0] rounded px-3 focus:ring-2 focus:ring-[#2d4fb1]" value="{{ old('email') }}" required />

      <!-- Password -->
      <label for="password" class="text-sm font-medium text-[#2c2c2c]">Password</label>
      <div class="relative">
        <input type="password" name="password" id="password" placeholder="Masukkan password"
          class="h-10 w-full border border-[#a1a0a0] rounded px-3 pr-10 focus:ring-2 focus:ring-[#2d4fb1]" required />
        <button type="button" id="togglePassword" aria-label="Toggle Password Visibility"
          class="absolute right-2 top-1/2 -translate-y-1/2 text-blue-600 hover:text-blue-800 focus:outline-none">
        <!-- Eye open icon (hidden by default) -->
        <svg id="eyeOpen" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="hidden">
          <path d="M11.5 18c4 0 7.46-2.22 9.24-5.5C18.96 9.22 15.5 7 11.5 7s-7.46 2.22-9.24 5.5C4.04 15.78 7.5 18 11.5 18m0-12c4.56 0 8.5 2.65 10.36 6.5C20 16.35 16.06 19 11.5 19S3 16.35 1.14 12.5C3 8.65 6.94 6 11.5 6m0 2C14 8 16 10 16 12.5S14 17 11.5 17S7 15 7 12.5S9 8 11.5 8m0 1A3.5 3.5 0 0 0 8 12.5a3.5 3.5 0 0 0 3.5 3.5a3.5 3.5 0 0 0 3.5-3.5A3.5 3.5 0 0 0 11.5 9"/>
        </svg>
        <!-- Eye closed icon (shown by default) -->
        <svg id="eyeClosed" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor">
          <path d="M2.54 4.71L3.25 4L20 20.75l-.71.71l-3.34-3.35c-1.37.57-2.87.89-4.45.89c-4.56 0-8.5-2.65-10.36-6.5c.97-2 2.49-3.67 4.36-4.82zM11.5 18c1.29 0 2.53-.23 3.67-.66l-1.12-1.13c-.73.5-1.6.79-2.55.79C9 17 7 15 7 12.5c0-.95.29-1.82.79-2.55L6.24 8.41a10.64 10.64 0 0 0-3.98 4.09C4.04 15.78 7.5 18 11.5 18m9.24-5.5C18.96 9.22 15.5 7 11.5 7c-1.15 0-2.27.19-3.31.53l-.78-.78C8.68 6.26 10.06 6 11.5 6c4.56 0 8.5 2.65 10.36 6.5a11.47 11.47 0 0 1-4.07 4.63l-.72-.73c1.53-.96 2.8-2.3 3.67-3.9M11.5 8C14 8 16 10 16 12.5c0 .82-.22 1.58-.6 2.24l-.74-.74c.22-.46.34-.96.34-1.5A3.5 3.5 0 0 0 11.5 9c-.54 0-1.04.12-1.5.34l-.74-.74c.66-.38 1.42-.6 2.24-.6M8 12.5a3.5 3.5 0 0 0 3.5 3.5c.67 0 1.29-.19 1.82-.5L8.5 10.68c-.31.53-.5 1.15-.5 1.82"/>
        </svg>
      </button>
      </div>

      <!-- Konfirmasi Password -->
      <label for="password_confirmation" class="text-sm font-medium text-[#2c2c2c]">Konfirmasi Password</label>
      <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Konfirmasi password"
        class="h-10 border border-[#a1a0a0] rounded px-3 focus:ring-2 focus:ring-[#2d4fb1]" required />

         <!-- Role -->
      <label for="role" class="text-sm font-medium text-[#2c2c2c]">Daftar sebagai</label>
      <select name="role" id="role" class="h-10 border border-[#a1a0a0] rounded px-3 focus:ring-2 focus:ring-[#2d4fb1]" required>
        <option value="" disabled selected>Pilih role</option>
        <option value="student" {{ old('role') === 'student' ? 'selected' : '' }}>Siswa</option>
        <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Petugas</option>
      </select>

      <!-- NIS dan Kelas (untuk siswa) -->
      <div id="studentFields" class="hidden flex flex-col gap-5">
        <div>
          <label for="nis" class="text-sm font-medium text-[#2c2c2c]">NIS</label>
          <input type="text" name="nis" id="nis" placeholder="Masukkan NIS"
            class="h-10 border border-[#a1a0a0] rounded px-3 focus:ring-2 focus:ring-[#2d4fb1] w-full"
            value="{{ old('nis') }}" />
        </div>

        <div>
          <label for="class" class="text-sm font-medium text-[#2c2c2c]">Kelas</label>
          <input type="text" name="class" id="class" placeholder="Masukkan kelas"
            class="h-10 border border-[#a1a0a0] rounded px-3 focus:ring-2 focus:ring-[#2d4fb1] w-full"
            value="{{ old('class') }}" />
        </div>
      </div>

      <!-- Jabatan (untuk admin) -->
      <div id="adminFields" class="hidden flex flex-col gap-5">
        <div>
          <label for="position" class="text-sm font-medium text-[#2c2c2c]">Jabatan</label>
          <input type="text" name="position" id="position" placeholder="Masukkan jabatan"
            class="h-10 border border-[#a1a0a0] rounded px-3 focus:ring-2 focus:ring-[#2d4fb1] w-full"
            value="{{ old('position') }}" />
        </div>
      </div>  

      <!-- Tombol Register -->
      <button type="submit" class="bg-[#2d4fb1] text-white rounded py-2 hover:bg-[#24438a] transition">Daftar</button>

      <!-- Link ke login -->
      <p class="text-sm text-center">Sudah punya akun? <a href="{{ route('login.form') }}" class="text-[#2d4fb1] hover:underline">Login di sini</a></p>
    </form>
  </div>

  <!-- Script Toggle -->
<script>
  const roleSelect = document.getElementById('role');
  const studentFields = document.getElementById('studentFields');
  const adminFields = document.getElementById('adminFields');
  const togglePassword = document.getElementById('togglePassword');
  const passwordInput = document.getElementById('password');
  const eyeOpenIcon = document.getElementById('eyeOpen');
  const eyeClosedIcon = document.getElementById('eyeClosed');

  // Menampilkan field sesuai role yang dipilih
  roleSelect.addEventListener('change', () => {
    if (roleSelect.value === 'student') {
      studentFields.classList.remove('hidden');
      adminFields.classList.add('hidden');
    } else if (roleSelect.value === 'admin') {
      adminFields.classList.remove('hidden');
      studentFields.classList.add('hidden');
    } else {
      studentFields.classList.add('hidden');
      adminFields.classList.add('hidden');
    }
  });

  // Toggle password visibility
  togglePassword.addEventListener('click', () => {
    const isPassword = passwordInput.getAttribute('type') === 'password';
    passwordInput.setAttribute('type', isPassword ? 'text' : 'password');

    // Toggle icon
    eyeOpenIcon.classList.toggle('hidden', !isPassword);
    eyeClosedIcon.classList.toggle('hidden', isPassword);
  });

  // Set state on load (misal jika form gagal validasi dan reload)
  window.addEventListener('DOMContentLoaded', () => {
    if (roleSelect.value === 'student') {
      studentFields.classList.remove('hidden');
    }
    if (roleSelect.value === 'admin') {
      adminFields.classList.remove('hidden');
    }
  });
</script>

</body>
</html>