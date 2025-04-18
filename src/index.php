<?php
session_start();
include('database/connection.php');

if (isset($_SESSION['userID'])) {
    $_SESSION['errorLogin'] = 'You are already logged in!';
    header('Location: router/main.php?module=home');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="images/BG_LOGIN.png" type="image/x-icon" />
    <link rel="stylesheet" href="styles/loading.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css" />
    <link rel="stylesheet" href="output.css" />
    <title>Login - Purchase Order System</title>
    <style>
        .bg {
            background-image: url('images/bggg.jpg');
        }

        .overlay {
            position: absolute;
            inset: 0;
            background-color: black;
            opacity: 0.8;
            z-index: 10;

        }

        .horizon_logo {
            position: absolute;
            top: 32%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 100%;
            max-width: 400px;
            height: auto;
            z-index: 20;

        }
    </style>
</head>

<body class="h-screen bg-gray-100 overflow-hidden">
    <?php include('components/spinner.php') ?>
    <div class="bg-gray-100 flex justify-center h-screen">
        <div class="w-3/5 h-screen hidden lg:block bg-cover bg-center bg-no-repeat bg relative">
            <div class="overlay">
            </div>
            <div class="relative z-20 flex flex-col items-center justify-center h-full">
                <img src="images/logoo.png" class="horizon_logo mb-12" alt="">
                <h1 class="text-center text-white font-extrabold text-4xl lg:text-5xl mb-2">
                    EVENT <span class="text-gray-400 font-normal">HORIZON</span>
                </h1>
                <p class="text-center  text-lg lg:text-1xl text-[#EE8D48] tracking-widest font-semibold">
                    MANUFACTURING COMPANY
                </p>
            </div>
        </div>

        <div class="w-1/2 p-8 flex pt-22 justify-center">
            <div class="w-full">
                <h1 class="text-center text-[#EF984A] font-extrabold text-[64px] mb-4">Log In</h1>
                <p class="text-center font-light text-[14px] mb-6">Sign in to access your account</p>

                <form action="auth/login.php" method="POST" class="space-y-6">
                    <div class="pt-6">
                        <label for="email" class="pl-2 pb-2 block text-sm font-medium">Email your email address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="youremail@example.com"
                            class="mt-1 block w-full h-[59px] px-4 py-2 border border-gray-300 rounded-md shadow-sm focus:ring-[#0C4212] focus:border-[#0C4212] sm:text-sm"
                            required />
                    </div>

                    <div class="pt-6">
                        <label for="password" class="pl-2 pb-2 block text-sm font-medium">Enter your password</label>
                        <input
                            type="password"
                            id="password"
                            name="password"
                            placeholder="*****************"
                            class="mt-1 block w-full h-[59px] px-4 border border-gray-300 rounded-md shadow-sm focus:ring-[#0C4212] focus:border-[#0C4212] sm:text-sm"
                            required />
                    </div>

                    <div class="flex flex-row items-center justify-between pt-2">
                        <label class="inline-flex items-center">
                            <input type="checkbox" class="form-checkbox h-4 w-4 text-[#0C4212] border-gray-300 rounded focus:ring-[#0C4212]">
                            <span class="ml-2 text-[14px] text-[#0C4212]">Remember me?</span>
                        </label>
                        <p class="text-[14px] text-[#0C4212]">Forgot password?</p>
                    </div>

                    <div class="pt-8">
                        <button
                            type="submit"
                            class="w-full h-[60px] bg-[#FF6B00] text-white text-extrabold text-[24px] py-2 px-4 rounded-md hover:bg-green-700 transition duration-200">
                            Sign In
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
<script src="script/loading.js"></script>
<script src="script/toast.js"></script>
<script src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
<script>
    <?php if (isset($_SESSION['error'])): ?>
        showToast("<?php echo $_SESSION['error']; ?>", "error");
        <?php unset($_SESSION['error']); ?>
    <?php endif; ?>
</script>

</html>