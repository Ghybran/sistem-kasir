<x-app-layout>
    <main id="main" class="content-center bg-white w-full h-100 rounded-none">
        <div class="relative overflow-x-auto">
            <form action="{{ url('/order') }}" method="POST">
                @csrf
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
                                        Rp {{ number_format($item->price, 0, ',', '.') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <button type="submit" name="orderItem" value="{{ $item->item }}-{{ $item->price }}" class="focus:outline-none text-white bg-purple-700
                                             hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2
                                              dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Order</button>
                                    </td>
                                </tr>
                        @endforeach
                    </tbody>
                </table>
                <input type="hidden" name="orders" value="{{ old('orders') ?? '' }}">
                <div class="mt-4 p-4 border rounded-lg bg-gray-100 dark:bg-gray-800 text-gray-900 dark:text-white">
                    <h2 class="text-xl mb-2">Order Summary</h2>
                    <div id="order-summary">
                        @if (session('orderSummary'))
                            @foreach (session('orderSummary') as $order)
                                <div class="p-2 border-b border-gray-200 dark:border-gray-700">
                                    Menu: {{ $order['item'] }}, Harga: Rp {{ number_format($order['price'], 0, ',', '.') }}
                                </div>
                            @endforeach
                        @endif
                    </div>
                    <div id="order-total" class="mt-2">
                        @if (session('totalPrice'))
                            Total Harga: Rp {{ number_format(session('totalPrice'), 0, ',', '.') }}
                        @endif
                    </div>
                    <div class="mt-4">
                        <label for="pemesan">Pemesan:</label>
                        <input type="text" id="pemesan" name="pemesan" class="border rounded px-2 py-1">
                        <button type="submit" name="submitOrder" value="1" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900">Submit Order</button>
                    </div>
                </div>
            </form>
        </div>
    </main>
</x-app-layout>
