<?php
include('database/connection.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="output.css">
    <title>Login - Purchase Order System</title>
</head>

<!-- filepath: c:\xampp\htdocs\Purchase-Order-System\src\index.php -->
<body class="h-screen bg-gray-100 overflow-hidden">
    <div class="bg-gray-100 flex justify-center h-screen">
        <!-- Left: Image -->
        <div class="w-3/4 h-screen hidden lg:block">
            <img src="images/bgLogin.jpg" alt="Placeholder Image" class="object-cover w-full h-full bg-no-repeat opacity-50">
        </div>
        <!-- Right: Login Form -->
        <div class="w-1/2 p-8 flex pt-22 justify-center">
            <div class="w-full">
                <h1 class="text-center text-[#0C4212] font-extrabold text-[64px] mb-4">Log In</h1>
                <p class="text-center text-[#0C4212] font-light text-[14px] mb-6">Sign in to access your account</p>

                <form action="" method="POST" class="space-y-6">
                    <!-- Email Input -->
                    <div class="pt-6">
                        <label for="email" class="pl-2 pb-2 block text-sm font-medium text-gray-700">Email your email address</label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email" 
                            placeholder="youremail@example.com" 
                            class="mt-1 block w-full h-[59px] px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0C4212] focus:border-[#0C4212] sm:text-sm"
                            required
                        />
                    </div>

                    <!-- Password Input -->
                    <div class="pt-6">
                        <label for="password" class="pl-2 pb-2 block text-sm font-medium text-gray-700">Enter your password</label>
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            placeholder="*****************" 
                            class="mt-1 block w-full h-[59px] px-4  border border-gray-300 rounded-md shadow-sm focus:ring-[#0C4212] focus:border-[#0C4212] sm:text-sm"
                            required
                        />
                    </div>

                    <div class="flex flex-row items-center justify-between pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-[#0C4212] border-gray-300 rounded focus:ring-[#0C4212]">
                            <span class="ml-2 text-[14px] text-[#0C4212]">Remember me?</span>
                        </label>
                        <p class="text-[14px] text-[#0C4212]">Forgot password?</p>
                    </div>

                    <!-- Submit Button -->
                    <div class="pt-8">
                        <button 
                            type="submit" 
                            class="w-full h-[60px] bg-[#0C4212] text-white text-extrabold text-[20px]  py-2 px-4 rounded-md hover:bg-green-700 transition duration-200"
                        >
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>