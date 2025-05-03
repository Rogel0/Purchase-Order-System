<div class="flex">
    <div class="fixed inset-0 bg-black bg-opacity-30 z-10 hidden" id="drawerOverlay"></div>


    <div class="fixed top-0 right-0 z-20 w-3/5 h-full transition-all duration-500 transform translate-x-full bg-white shadow-lg" id="drawerContent">
        <div class="px-6 py-4 flex flex-col h-full">
    
            <div class="flex justify-start border-b border-gray-200 p-4">
                <h2 class="text-lg font-semibold">New Invoice</h2>
            </div>


            <div class="flex-1 p-4">
                <p class="text-gray-500">This is the invoice drawer content.</p>
            </div>

            <div class="mt-auto flex justify-end p-4">
                <button id="closeDrawerBtn" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Close Drawer
                </button>
            </div>
        </div>
    </div>
</div>
<style>
    #drawerOverlay {
        opacity: 0.5;
        transition: opacity 0.3s ease-in-out;
        background-color: black;
    }
</style>