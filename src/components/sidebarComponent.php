<!-- filepath: c:\xampp\htdocs\Purchase-Order-System\src\components\sidebarComponent.php -->
<aside class="flex flex-col justify-between w-70 border-r-2 border-gray-200 bg-[#EF984A] pl-8 pt-10" style="height: 89.9vh">
    <!-- Top Navigation -->
    <div class="space-y-2 pt-4">

        

        <!-- Products -->
        <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'products') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
            <svg class="w-6 h-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'products') ? 'white' : '#000000'; ?>">
                <path d="M17 8h1v11H2V8h1V6c0-2.76 2.24-5 5-5 .71 0 1.39.15 2 .42.61-.27 1.29-.42 2-.42 2.76 0 5 2.24 5 5v2zM5 6v2h2V6c0-1.13.39-2.16 1.02-3H8C6.35 3 5 4.35 5 6zm10 2V6c0-1.65-1.35-3-3-3h-.02c.63.84 1.02 1.87 1.02 3v2h2zm-5-4.22C9.39 4.33 9 5.12 9 6v2h2V6c0-.88-.39-1.67-1-2.22z"></path>
            </svg>
            <a href="../router/main.php?module=products" class="ml-2 text-[20px]">Products</a>
        </div>

        <!-- Orders -->
        <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'orders') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
            <svg class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>">
                <rect x="5" y="4" width="14" height="17" rx="2" stroke="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>" stroke-width="2"></rect>
                <path d="M9 9H15" stroke="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round"></path>
                <path d="M9 13H15" stroke="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round"></path>
                <path d="M9 17H13" stroke="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round"></path>
            </svg>
            <a href="../router/main.php?module=orders" class="ml-2 text-[20px]">Orders</a>
        </div>

        <!-- Vendors -->
        <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'vendors') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
            <svg class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'vendors') ? 'white' : '#000000'; ?>">
                <path d="M14 22V16.9612C14 16.3537 13.7238 15.7791 13.2494 15.3995L11.5 14M11.5 14L13 7.5M11.5 14L10 13M13 7.5L11 7M13 7.5L15.0426 10.7681C15.3345 11.2352 15.8062 11.5612 16.3463 11.6693L18 12M10 13L11 7M10 13L9.40011 16.2994C9.18673 17.473 8.00015 18.2 6.85767 17.8573L4 17M11 7L8.10557 8.44721C7.428 8.786 7 9.47852 7 10.2361V12M14.5 3.5C14.5 4.05228 14.0523 4.5 13.5 4.5C12.9477 4.5 12.5 4.05228 12.5 3.5C12.5 2.94772 12.9477 2.5 13.5 2.5C14.0523 2.5 14.5 2.94772 14.5 3.5Z" stroke="<?php echo ($module === 'vendors') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </svg>
            <a href="../router/main.php?module=vendors" class="ml-2 text-[20px]">Vendors</a>
        </div>

        <!-- Invoices -->
        <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'invoices') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
            <svg class="w-6 h-6" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'invoices') ? 'white' : '#000000'; ?>">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M6.55281 1.60553C7.10941 1.32725 7.77344 1 9 1C10.2265 1 10.8906 1.32722 11.4472 1.6055L11.4631 1.61347C11.8987 1.83131 12.2359 1.99991 13 1.99993C14.2371 1.99998 14.9698 1.53871 15.2141 1.35512C15.5944 1.06932 16.0437 1.09342 16.3539 1.2369C16.6681 1.38223 17 1.72899 17 2.24148L17 13H20C21.6562 13 23 14.3415 23 15.999V19C23 19.925 22.7659 20.6852 22.3633 21.2891C21.9649 21.8867 21.4408 22.2726 20.9472 22.5194C20.4575 22.7643 19.9799 22.8817 19.6331 22.9395C19.4249 22.9742 19.2116 23.0004 19 23H5C4.07502 23 3.3148 22.7659 2.71092 22.3633C2.11331 21.9649 1.72739 21.4408 1.48057 20.9472C1.23572 20.4575 1.11827 19.9799 1.06048 19.6332C1.03119 19.4574 1.01616 19.3088 1.0084 19.2002C1.00194 19.1097 1.00003 19.0561 1 19V2.24146C1 1.72899 1.33184 1.38223 1.64606 1.2369C1.95628 1.09341 2.40561 1.06931 2.78589 1.35509C3.03019 1.53868 3.76289 1.99993 5 1.99993C5.76415 1.99993 6.10128 1.83134 6.53688 1.6135L6.55281 1.60553ZM3.00332 19L3 3.68371C3.54018 3.86577 4.20732 3.99993 5 3.99993C6.22656 3.99993 6.89059 3.67269 7.44719 3.39441L7.46312 3.38644C7.89872 3.1686 8.23585 3 9 3C9.76417 3 10.1013 3.16859 10.5369 3.38643L10.5528 3.39439C11.1094 3.67266 11.7734 3.9999 13 3.99993C13.7927 3.99996 14.4598 3.86581 15 3.68373V19C15 19.783 15.1678 20.448 15.4635 21H5C4.42498 21 4.0602 20.8591 3.82033 20.6992C3.57419 20.5351 3.39761 20.3092 3.26943 20.0528C3.13928 19.7925 3.06923 19.5201 3.03327 19.3044C3.01637 19.2029 3.00612 19.1024 3.00332 19ZM19.3044 20.9667C19.5201 20.9308 19.7925 20.8607 20.0528 20.7306C20.3092 20.6024 20.5351 20.4258 20.6992 20.1797C20.8591 19.9398 21 19.575 21 19V15.999C21 15.4474 20.5529 15 20 15H17L17 19C17 19.575 17.1409 19.9398 17.3008 20.1797C17.4649 20.4258 17.6908 20.6024 17.9472 20.7306C18.2075 20.8607 18.4799 20.9308 18.6957 20.9667C18.8012 20.9843 18.8869 20.9927 18.9423 20.9967C19.0629 21.0053 19.1857 20.9865 19.3044 20.9667Z" fill="<?php echo ($module === 'invoices') ? 'white' : '#000000'; ?>"></path>
            </svg>
            <a href="../router/main.php?module=invoices" class="ml-2 text-[20px]">Invoices</a>
        </div>
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