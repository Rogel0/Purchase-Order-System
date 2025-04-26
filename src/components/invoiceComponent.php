<div class="flex h-[79vh] bg-white">
  <!-- Sidebar -->
  <aside class="w-1/4 border-r border-orange-200 p-4 max-h[40vh]">
    <h2 class="text-2xl font-bold text-red-600 mb-6">Invoices</h2>
    <ul class="space-y-2">
      <li class="text-sm text-gray-700 hover:underline">Invoice 48 - 6969</li>
      <li class="text-sm text-gray-700 hover:underline">Invoice 48 - 6970</li>
      <li class="text-sm text-gray-700 hover:underline">Invoice 48 - 6971</li>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-6 max-h-44">
    <!-- Header -->
    <div class="flex items-center justify-between mb-6">
      <div class="relative w-1/2">
        <input type="text" placeholder="Search" class="w-full pl-10 pr-4 py-2 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-orange-500">
        <span class="absolute left-3 top-2.5 text-gray-400">
          🔍
        </span>
      </div>
      <button class="bg-orange-500 text-white px-4 py-2 rounded-md hover:bg-orange-600">
        + New Invoice
      </button>
    </div>

    <!-- Invoice Content -->
    <div class="border border-orange-300 rounded-md p-6 shadow-sm">
      <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold text-red-600">Invoice <span class="font-normal">2025-04-04</span></h1>
        <button class="text-xl">🖨️</button>
      </div>

      <div class="flex justify-between mb-6">
        <div>
          <h2 class="font-bold">From</h2>
          <p>Lyceum of Alabang<br>KM. 30 National Road</p>
        </div>
        <div>
          <h2 class="font-bold">Issued to</h2>
          <p>Lyceum of Alabang<br>KM. 30 National Road</p>
        </div>
      </div>

      <!-- Table -->
      <div class="border-t border-b border-orange-300">
        <div class="grid grid-cols-4 text-sm font-semibold text-gray-700 py-2 border-b border-orange-300">
          <div>Type</div>
          <div class="col-span-2">Description</div>
          <div class="text-right">Qty</div>
          <div class="text-right">Amount</div>
        </div>
        <div class="grid grid-cols-4 text-sm py-2">
          <div>Service</div>
          <div class="col-span-2">Service Charges</div>
          <div class="text-right">1</div>
          <div class="text-right">6,969</div>
        </div>
      </div>

      <!-- Payment Info -->
      <div class="mt-6 text-sm text-gray-600">
        All Payments are in PESO, tax fee is up to the buyer
      </div>

      <!-- Totals -->
      <div class="mt-4 text-right text-sm">
        <div class="flex justify-end">
          <span class="mr-4">Subtotal</span>
          <span>₱ 6,969</span>
        </div>
        <div class="flex justify-end mt-2 text-lg font-bold text-red-600">
          <span class="mr-4">Total</span>
          <span>₱ 6,969</span>
        </div>
      </div>
    </div>
  </main>
</div>
