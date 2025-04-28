<div class="flex h-[79vh] bg-gray-50">
  <!-- Sidebar -->
  <aside class="w-1/4 bg-white border-r border-gray-200 p-6 max-h-[79vh] overflow-y-auto shadow-lg rounded-lg">
    <h2 class="text-2xl font-bold text-[#FF6B00] mb-8">Invoices</h2>
    <ul class="space-y-4">
      <?php
      if (!empty($invoice)) {
        foreach ($invoice as $row) {
          echo '<li class="text-base text-gray-700 hover:text-[#FF6B00] hover:underline cursor-pointer transition-all duration-200" onclick="showInvoiceDetails(' . htmlspecialchars(json_encode($row)) . ')">Invoice <span class="font-semibold">' . htmlspecialchars($row['invoicenumber']) . '</span></li>';
        }
      } else {
        echo '<li class="text-sm text-gray-500">No invoices found</li>';
      }
      ?>
    </ul>
  </aside>

  <!-- Main Content -->
  <main class="flex-1 p-8 max-h-[79vh] overflow-y-auto bg-white shadow-lg rounded-lg ml-4">
    <div id="invoiceDetails" class="h-full w-full p-8 border border-gray-200 rounded-xl bg-gray-50">
      <div class="items-center">
        <p class="text-xl text-gray-500 font-semibold">Select an invoice to view details</p>
      </div>
    </div>
  </main>
</div>

<script>
  function showInvoiceDetails(invoice) {
    const invoiceDetails = document.getElementById('invoiceDetails');
    invoiceDetails.innerHTML = `
      <div class="space-y-4">
        <!-- Header -->
        <div class="flex justify-between items-center">
          <div>
            <h1 class="text-3xl font-bold text-[#FF6B00]">Invoice <span class="text-gray-700">${invoice.invoicenumber}</span></h1>
            <p class="text-sm text-gray-500 mt-1">Issued Date: <span class="font-medium">${invoice.dateissued || 'N/A'}</span></p>
          </div>
          <button class="flex items-center gap-2 text-sm font-medium text-[#FF6B00] bg-orange-100 px-4 py-2 rounded-lg hover:bg-orange-200 transition">
            🖨️ Print
          </button>
        </div>

        <!-- From and To -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
          <div>
            <h2 class="text-gray-500 font-semibold mb-1">From</h2>
            <p class="text-gray-700 font-medium">${invoice.companyfrom}</p>
          </div>
          <div>
            <h2 class="text-gray-500 font-semibold mb-1">Issued To</h2>
            <p class="text-gray-700 font-medium">${invoice.companyto}</p>
          </div>
        </div>

        <!-- Items Table -->
        <div class="border rounded-lg overflow-hidden">
          <div class="grid grid-cols-5 bg-orange-100 text-gray-700 font-semibold text-sm p-3">
            <div>Type</div>
            <div class="col-span-2">Description</div>
            <div class="text-right">Qty</div>
            <div class="text-right">Amount</div>
          </div>
          <div class="grid grid-cols-5 border-t bg-white text-gray-600 text-sm p-4">
            <div>${invoice.type}</div>
            <div class="col-span-2">${invoice.description}</div>
            <div class="text-right">${invoice.qty}</div>
            <div class="text-right">₱ ${invoice.amount}</div>
          </div>
        </div>

        <!-- Payment Notes -->
        <div class="bg-gray-100 p-4 rounded-md text-gray-600 text-sm">
          <p>All payments are in PESO. Tax fees are the responsibility of the buyer.</p>
        </div>

        <!-- Totals -->
        <div class="flex flex-col items-end space-y-2 text-sm">
          <div class="flex gap-8">
            <span class="font-semibold text-gray-600">Subtotal:</span>
            <span class="font-medium text-gray-700">₱ ${invoice.subtotal}</span>
          </div>
          <div class="flex gap-8 text-lg font-bold text-[#FF6B00]">
            <span>Total:</span>
            <span>₱ ${invoice.total}</span>
          </div>
        </div>
      </div>
    `;
  }
</script>