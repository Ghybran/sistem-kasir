<x-app-layout>
    <main id="main" class="content-center bg-white w-full h-100 rounded-none">
        <div class="flex justify-center items-center h-screenr">
            <h1>
                <p scope="col" class="w-10 text-6xl px-6 py-3" style="font-family: 'Times New Roman', Times, serif;">Halo</p>
            </h1>
        </div>
        <div class="relative overflow-x-auto">
            <form action="{{ url('/order') }}" method="POST">
                @csrf
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">No</th>
                            <th scope="col" class="px-6 py-3">Pemesan</th>
                            <th scope="col" class="px-6 py-3">Menu</th>
                            <th scope="col" class="px-6 py-3">Harga</th>
                            <th scope="col" class="px-6 py-3">Waktu</th>
                            <th scope="col" class="px-6 py-3">Update</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($orders as $item)
                            <tr>
                                <td class="px-6 py-3 text-black">{{ $no++ }}</td>
                                <td class="px-6 py-3 text-black">{{ $item->pemesan }}</td>
                                <td class="px-6 py-3 text-black">
                                    @if(is_array($item->menu))
                                        <ul>
                                            @foreach ($item->menu as $menuItem)
                                                <li>{{ $menuItem['item'] }} = {{ $menuItem['price'] }}</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        Invalid menu data
                                    @endif
                                </td>
                                <td class="px-6 py-3 text-black">{{ $item->total }}</td>
                                <td class="px-6 py-3 text-black">{{ $item->created_at }}</td>
                                <td class="px-6 py-3 text-black">{{ $item->updated_at }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </form>
        </div>
    </main>
</x-app-layout>
