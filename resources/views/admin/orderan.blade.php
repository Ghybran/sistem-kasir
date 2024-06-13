<x-app-layout>
    <main id="main" class="content-center bg-white w-full h-100 rounded-none">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">Pemesan</th>
                        <th scope="col" class="px-6 py-3">Menu</th>
                        <th scope="col" class="px-6 py-3" colspan="2">Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($hasil as $item)
                            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                    {{ $item->pemesan }}
                                </td>
                                <td class="px-6 py-4" colspan="2">
                                    {{ $item->menu}}
                                </td>
                                <td class="px-6 py-4">
                                    Rp {{ number_format($item['price'], 0, ',', '.') }}
                                </td>
                            </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</x-app-layout>
