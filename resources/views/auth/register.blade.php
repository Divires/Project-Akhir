<!DOCTYPE html>
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
</html>
