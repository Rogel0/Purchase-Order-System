<!-- filepath: c:\xampp\htdocs\Purchase-Order-System\src\components\sidebarComponent.php -->
<aside class="flex flex-col justify-between w-70 border-r-2 border-gray-200 bg-[#EF984A] pl-8 pt-10" style="height: 89.9vh">
    <!-- Top Navigation -->
    <div class="space-y-2 pt-4">



        <!-- Vendors -->
        <a href="../router/admin-main.php?module=vendors">
            <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'vendors') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
                <svg class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'vendors') ? 'white' : '#000000'; ?>">
                    <path d="M14 22V16.9612C14 16.3537 13.7238 15.7791 13.2494 15.3995L11.5 14M11.5 14L13 7.5M11.5 14L10 13M13 7.5L11 7M13 7.5L15.0426 10.7681C15.3345 11.2352 15.8062 11.5612 16.3463 11.6693L18 12M10 13L11 7M10 13L9.40011 16.2994C9.18673 17.473 8.00015 18.2 6.85767 17.8573L4 17M11 7L8.10557 8.44721C7.428 8.786 7 9.47852 7 10.2361V12M14.5 3.5C14.5 4.05228 14.0523 4.5 13.5 4.5C12.9477 4.5 12.5 4.05228 12.5 3.5C12.5 2.94772 12.9477 2.5 13.5 2.5C14.0523 2.5 14.5 2.94772 14.5 3.5Z" stroke="<?php echo ($module === 'vendors') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
                <span class="ml-2 text-[20px]">Manage Vendors</span>
            </div>
        </a>


        <!-- Manage Products -->
        <a href="../router/admin-main.php?module=products">
            <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'products') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
                <svg class="w-6 h-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'products') ? 'white' : '#000000'; ?>">
                    <path d="M17 8h1v11H2V8h1V6c0-2.76 2.24-5 5-5 .71 0 1.39.15 2 .42.61-.27 1.29-.42 2-.42 2.76 0 5 2.24 5 5v2zM5 6v2h2V6c0-1.13.39-2.16 1.02-3H8C6.35 3 5 4.35 5 6zm10 2V6c0-1.65-1.35-3-3-3h-.02c.63.84 1.02 1.87 1.02 3v2h2zm-5-4.22C9.39 4.33 9 5.12 9 6v2h2V6c0-.88-.39-1.67-1-2.22z"></path>
                </svg>
                <span class="ml-2 text-[20px]">Manage Products</span>
            </div>
        </a>

        <a href="../router/admin-main.php?module=orders" class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'orders') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
            <svg class="w-6 h-6" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>">
                <rect x="5" y="4" width="14" height="17" rx="2" stroke="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>" stroke-width="2"></rect>
                <path d="M9 9H15" stroke="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round"></path>
                <path d="M9 13H15" stroke="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round"></path>
                <path d="M9 17H13" stroke="<?php echo ($module === 'orders') ? 'white' : '#000000'; ?>" stroke-width="2" stroke-linecap="round"></path>
            </svg>
            <span class="ml-2 text-[20px]">Manage Orders</span>
        </a>

        <!-- Manage Accounts -->
        <a href="../router/admin-main.php?module=accounts">
            <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'accounts') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
                <svg class="w-6 h-6" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg" fill="<?php echo ($module === 'accounts') ? 'white' : '#000000'; ?>">
                    <path d="M17 8h1v11H2V8h1V6c0-2.76 2.24-5 5-5 .71 0 1.39.15 2 .42.61-.27 1.29-.42 2-.42 2.76 0 5 2.24 5 5v2zM5 6v2h2V6c0-1.13.39-2.16 1.02-3H8C6.35 3 5 4.35 5 6zm10 2V6c0-1.65-1.35-3-3-3h-.02c.63.84 1.02 1.87 1.02 3v2h2zm-5-4.22C9.39 4.33 9 5.12 9 6v2h2V6c0-.88-.39-1.67-1-2.22z"></path>
                </svg>
                <span class="ml-2 text-[20px]">Manage Accounts</span>
            </div>
        </a>

        <a href="../router/admin-main.php?module=threshhold">
            <div class="flex items-center space-x-2 p-4 hover:bg-[#E57785] <?php echo ($module === 'threshhold') ? 'bg-[#DF1A33] text-white' : 'text-[#000000]'; ?>">
                <svg class="w-6 h-6" viewBox="0 0 512 512" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#000000">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <title>threshold-off</title>
                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                            <g id="icon" fill="#000000" transform="translate(64.000000, 64.000000)">
                                <path d="M42.6666667,1.42108547e-14 L42.666,341.333 L384,341.333333 L384,384 L1.42108547e-14,384 L1.42108547e-14,1.42108547e-14 L42.6666667,1.42108547e-14 Z M290.80086,91.7065484 L382.469976,176.324193 L353.530024,207.675807 L306.517333,164.288 L263.90925,265.523605 L197.653333,204.8 L140.664173,309.333333 L64,309.333333 L64,266.666667 L115.328,266.666667 L186.323324,136.522922 L248.085333,193.130667 L290.80086,91.7065484 Z" id="Combined-Shape"> </path>
                            </g>
                        </g>
                    </g>
                </svg>
                <span class="ml-2 text-[20px]">Manage Threshold</span>
            </div>
        </a>

        <div>

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