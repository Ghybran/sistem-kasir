<x-app-layout>
    <main id="main" class="content-center bg-white w-full h-100 rounded-none">
        <div class="relative overflow-x-auto">
            <form action="{{ url('/order') }}" method="POST" id="orderForm">
                @csrf
                <label for="pemesan">Nama Pemesan:</label>
                <input type="text" id="pemesan" name="pemesan" required>

                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Menu</th>
                            <th scope="col" class="px-6 py-3">Harga</th>
                            <th scope="col" class="px-6 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($men as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->item }}
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->price }}
                                </td>
                                <td class="px-6 py-4">
                                    <button type="button" class="pesanButton" data-id="{{ $item->id }}" data-price="{{ $item->price }}">pesan</button>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
        <div id="orderSummary" class="mt-4">
            <h2 class="text-xl font-bold">Pesanan Anda</h2>
            <ul id="orderList" class="list-disc pl-5">
                <!-- Pesanan akan ditampilkan di sini -->
            </ul>
            <button type="submit" form="orderForm" class="mt-4 px-4 py-2 bg-blue-500 text-white rounded">Submit Pesanan</button>
        </div>
    </main>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const orderForm = document.getElementById('orderForm');
            const orderList = document.getElementById('orderList');
            const pesanButtons = document.querySelectorAll('.pesanButton');

            pesanButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const id = button.getAttribute('data-id');
                    const price = button.getAttribute('data-price');
                    const itemText = button.parentElement.previousElementSibling.previousElementSibling.textContent;

                    const listItem = document.createElement('li');
                    listItem.textContent = `${itemText} - ${price}`;

                    // Add hidden inputs to form
                    const hiddenIdInput = document.createElement('input');
                    hiddenIdInput.type = 'hidden';
                    hiddenIdInput.name = 'items[][id_menu]';
                    hiddenIdInput.value = id;

                    const hiddenTotalInput = document.createElement('input');
                    hiddenTotalInput.type = 'hidden';
                    hiddenTotalInput.name = 'items[][total]';
                    hiddenTotalInput.value = price;

                    orderForm.appendChild(hiddenIdInput);
                    orderForm.appendChild(hiddenTotalInput);
                    orderList.appendChild(listItem);
                });
            });
        });
    </script>
</x-app-layout>
