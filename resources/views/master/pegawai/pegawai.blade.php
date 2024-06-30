<x-app-layout><br>
    <main id="main" class="content-center bg-white w-full h-100 rounded-none"><br>
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
                        @foreach ($role as $t)
                        <tr>
                            <th scope="col" class="px-6 py-3">{{ $t->name }}</th>
                            <th scope="col" class="px-6 py-3">{{ $t->email }}</th>
                            <th scope="col" class="px-6 py-3">{{ $t->role }}</th>
                            <th scope="col" class="px-6 py-3">{{ $t->password }}</th>
                        </tr>

                        @endforeach

            </form>
        </div>
    </main>
</x-app-layout>
