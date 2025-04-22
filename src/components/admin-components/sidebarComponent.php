<!-- filepath: c:\xampp\htdocs\Purchase-Order-System\src\components\sidebarComponent.php -->
<aside class="flex flex-col justify-between w-70 border-r-2 border-gray-200 bg-[#EF984A] pl-8 pt-10" style="height: 89.9vh">
    <!-- Top Navigation -->
    <div class="space-y-2 pt-4">

        <!-- Home -->
        <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'home') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
            <svg class="w-6 h-6" fill="<?php echo ($module === 'home') ? 'white' : '#000000'; ?>" viewBox="0 0 20 20">
                <path d="M10 2L2 7v11h6v-5h4v5h6V7l-8-5z" />
            </svg>
            <a href="../router/admin-main.php?module=home" class="ml-2 text-[20px]">Home</a>
        </div>


        <!-- Vendors -->
        <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'vendors') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
            <svg class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'vendors') ? 'white' : '#000000'; ?>">
                <path d="M14 22V16.9612C14 16.3537 13.7238 15.7791 13.2494 15.3995L11.5 14M11.5 14L13 7.5M11.5 14L10 13M13 7.5L11 7M13 7.5L15.0426 10.7681C15.3345 11.2352 15.8062 11.5612 16.3463 11.6693L18 12M10 13L11 7M10 13L9.40011 16.2994C9.18673 17.473 8.00015 18.2 6.85767 17.8573L4 17M11 7L8.10557 8.44721C7.428 8.786 7 9.47852 7 10.2361V12M14.5 3.5C14.5 4.05228 14.0523 4.5 13.5 4.5C12.9477 4.5 12.5 4.05228 12.5 3.5C12.5 2.94772 12.9477 2.5 13.5 2.5C14.0523 2.5 14.5 2.94772 14.5 3.5Z" stroke="<?php echo ($module === 'vendors') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <a href="#" class="ml-2 text-[20px]">Vendors</a>
        </div>

        

    <!-- Logout -->
    <div class="pb-6">
        <button type="button" class="flex ml-6 items-center space-x-2 font-semibold hover:text-red-300" id="logoutButton" onclick="window.location.href='../auth/logout.php'">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M21 12L13 12" stroke="#DF1A33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M18 15L20.913 12.087V12.087C20.961 12.039 20.961 11.961 20.913 11.913V11.913L18 9" stroke="#DF1A33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M16 5V4.5V4.5C16 3.67157 15.3284 3 14.5 3H5C3.89543 3 3 3.89543 3 5V19C3 20.1046 3.89543 21 5 21H14.5C15.3284 21 16 20.3284 16 19.5V19.5V19" stroke="#DF1A33" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <span class="ml-2 text-[18px]">Logout</span>
        </button>
    </div>
</aside>

<script>
    function toggleMenu(menu) {
        const submenu = document.getElementById(`menu-${menu}`);
        const arrow = document.getElementById(`arrow-${menu}`);
        submenu.classList.toggle('hidden');
        arrow.classList.toggle('rotate-180');
    }
</script>