<?php include('../drawer/vendorDrawer.php') ?>

<div>
    <div class="pt-6 pr-22 pl-22 flex flex-row justify-between items-center">
        <h3 class="text-[32px] font-bold text-[#0C4212]">Vendor List</h3>
        <button id="addVendorBtn" class="w-[155px] hover:scale-105 hover:cursor-pointer h-[42px] bg-[#0C4212] text-white font-bold flex items-center justify-center space-x-2 rounded-md">
            <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
            </svg>
            <span>New Vendor</span>
        </button>
    </div>
</div>

<script src="../script/vendorDrawer.js"></script>