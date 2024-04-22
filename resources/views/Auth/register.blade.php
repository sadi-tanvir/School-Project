<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        /* You can add custom styles here */
        .gradient-bg {
            background: linear-gradient(90deg, #1E3A8A 0%, #007BFF 50%, #1E3A8A 100%);
        }
    </style>
</head>
<body class="gradient-bg flex justify-center items-center h-screen mt-32">
    <div class="gradient-bg md:p-14 m-2 rounded-lg shadow-md   ">
        <h2 class="text-3xl text-white text-center font-semibold mb-4">Register</h2>
        <div class="">
            <form action="{{route('users.store')}}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="mt-5">
                    <p class="py-3 text-white">Name</p>
                    <input type="text" name="name" placeholder="Enter Name" class="input input-bordered w-full p-2 rounded" />
                </div>
                <div class="mt-5">
                    <label class="text-white ">Upload Image</label>
                    <span class="text-red-500 ">*</span>
                    <input type="file" name="image" class="file-input file-input-bordered file-input-accent w-full p-2 rounded text-white" />
                </div>

                <div class="mt-5">
                    <p class="py-3 text-white">Email</p>
                    <input type="email" name="email" placeholder="Enter Email"
                        class="input input-bordered w-full p-2 rounded" />
                </div>
                <div class="mt-5">
                    <p class="py-3 text-white">Password</p>
                    <input type="password" name="password" placeholder="Enter password"
                        class="input input-bordered w-full p-2 rounded" />
                </div>
                <div class="mt-5">
                    <p class="py-3 text-white">Phone Number</p>
                    <input type="text" name="phone_number" placeholder="Enter Email"
                        class="input input-bordered w-full p-2 rounded" />
                </div>
                <div class="mt-5">
                    <p class="py-3 text-white">Address</p>
                   
                        <textarea placeholder="Enter Address" class="textarea textarea-bordered textarea-sm w-full max-w-xs p-3 rounded " name="address" ></textarea>
                    
                </div>
               
                <div class="hidden mt-5">
                    <input name="school_code" value="{{$schoolCode}}" type="text"
                        class="hidden input input-bordered w-full p-2 rounded" />
                </div>
                <div class="my-5 flex justify-center">
                    <button type="submit" class=" btn bg-white btn-outline  p-3  rounded">
                        Register
                    </button>
                </div>
            </form>
        </div>
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
