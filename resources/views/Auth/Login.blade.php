<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* You can add custom styles here */
        .gradient-bg {
            background: linear-gradient(90deg, #1E3A8A 0%, #007BFF 50%, #1E3A8A 100%);
        }
    </style>
</head>
<body class="gradient-bg flex justify-center items-center h-screen">
    <div class="gradient-bg p-8 m-2 rounded-lg shadow-md w-full max-w-md">
        <h2 class="text-3xl text-white text-center font-semibold mb-4">Login</h2>
        <form action="{{route('login-user')}}">
            <div class="mb-4">
                <label for="username" class="block text-white ">Student ID or teacher ID or Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <i class="fas fa-user text-gray-400"></i>
                    </span>
                    <input type="text" id="username" name="name" class="form-input pl-10 mt-1 p-2 block w-full" placeholder="Enter your Id or email or Phone Number">
                </div>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-white">Password</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                        <i class="fas fa-lock text-gray-400"></i>
                    </span>
                    <input type="password" id="password" name="password" class="form-input pl-10 pr-5 mt-1 p-2 block w-full" placeholder="Enter your password">
                    <span class="absolute inset-y-0 right-0 flex items-center pr-2 cursor-pointer" id="togglePassword">
                        <i class="fas fa-eye text-gray-400" id="eye"></i>
                    </span>
                </div>
            </div>
            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline w-full">Login</button>
        </form>
    </div>

    <script>
        const togglePassword = document.getElementById('togglePassword');
        const password = document.getElementById('password');
        const eye = document.getElementById('eye');

        togglePassword.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            eye.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>
