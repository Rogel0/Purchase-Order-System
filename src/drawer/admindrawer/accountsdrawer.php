<?php
// Fetch active vendors from the database
$queryVendors = "SELECT vendor_id, vendor_name FROM active_vendors";
$resultVendors = $conn->query($queryVendors);
$activeVendors = $resultVendors->fetch_all(MYSQLI_ASSOC);

?>

<div class="flex">
    <!-- Overlay -->
    <div class="fixed inset-0 bg-black bg-opacity-30 z-10 hidden" id="drawerOverlay"></div>

    <!-- Drawer Content -->
    <div class="fixed top-0 right-0 z-20 w-3/5 h-full overflow-x-hidden transition-all duration-500 transform translate-x-full bg-white shadow-lg" id="drawerContent">
        <form action="../actions/AddProduct.php" method="POST" class="px-6 py-4 flex flex-col h-full overflow-y-auto">
            <!-- <input type="hidden" name="productInitialStock" value="200">
        <input type="hidden" name="productStatus" value="Pending"> -->
            <!-- Drawer Header -->
            <div class="flex justify-start border-b border-gray-200 p-4">
                <h2 class="text-lg font-semibold">Add new user</h2>
            </div>

            <!-- Drawer Body -->
            <div class="flex-1 p-4 flex gap-4 flex-col overflow-y-auto">
                <h4 class="font-semibold">User Information</h4>
                <div class="grid grid-cols-3 gap-4 p-8 border border-gray-200 h-auto">

                    <!-- User Name -->
                    <div>
                        <label for="username" class="text-sm">User Name</label>
                        <input type="text" name="usernamer" id="username" required class="w-full  border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter User Name">
                        
                    </div>
                    

                    <!-- Email Address -->
                    <div>
                        <label for="productName" class="text-sm">Email Address</label>
                        <input type="text" name="productName" id="productName" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter Email Address">
                    </div>
                    <br>


                    <!-- Phone Number -->
                    <div>
                        <label for="productName" class="text-sm">Phone Number</label>
                        <input type="text" name="productName" id="productName" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter Phone Number">
                    </div>

                    <!-- Address -->
                    <div>
                        <label for="productName" class="text-sm">Address</label>
                        <input type="text" name="productName" id="productName" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10" placeholder="Enter Address">
                    </div>
                    <br>

                    <!-- Role -->
                    <div>
                        <label for="productCategory" class="text-sm">Role</label>
                        <select name="productCategory" id="productCategory" required class="w-full border border-gray-300 rounded-md p-2 mt-1 h-10">
                            <option value="">Select Role</option>
                            <option value="category1">user</option>
                            <option value="category2">admin</option>
                            
                        </select>
                    </div>
                    
                     <!-- fileupload -->
                    <div>                
        <head>
        <meta charset="UTF-8">
        <style>
            .upload-box {
                border: 2px solid #eee;
                border-radius: 8px;
                width: 300px;
                height: 120px;
                display: flex;
                flex-direction: column;
                align-items: center;
                justify-content: center;
                cursor: pointer;
                margin-top: 10px;
            }
            .upload-box input[type="file"] {
                display: none;
            }
            .upload-icon {
                font-size: 32px;
                color: #aaa;
             }
            .upload-label {
                color: #bbb;
                font-size: 14px;
                margin-top: 8px;
            }
            </style>

<body>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label for="supporting_file">Supporting Info</label>
        <div class="upload-box" onclick="document.getElementById('supporting_file').click();">
            <div class="upload-icon">&#8682;</div>
            <div class="upload-label">File upload&nbsp;&nbsp;JPG / PNG</div>
            <input type="file" name="supporting_file" id="supporting_file" accept=".jpg,.jpeg,.png">
        </div>
        <br>
        <button type="submit" name="submit" class="px-6 py-2 bg-orange-500 text-white rounded-md hover:bg-orange-600">Upload</button>
    </form>
</body>
</html>
                    
                    </div>
                
                </div>
            </div>

            <!-- Drawer Footer -->
            <div class="mt-auto flex justify-end gap-6 p-3 border-t border-gray-200">
                <button type="submit" name="submitProductBtn" id="submitProductBtn" class="px-6 py-2 bg-green-500 text-white rounded-md hover:bg-green-600">
                    Save
                </button>
                <button type="button" id="closeDrawerBtn" class="px-6 py-2 bg-red-500 text-white rounded-md hover:bg-red-600">
                    Cancel
                </button>
            </div>
        </form>
    </div>
</div>

<style>
    #drawerOverlay {
        opacity: 0.5;
        transition: opacity 0.3s ease-in-out;
        background-color: black;
    }
</style>
<script src="../script/generate_product_number.js"></script>
<script src="../script/toast.js"></script>
