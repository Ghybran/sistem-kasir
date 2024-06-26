<x-app-layout>
    <main id="main" class="content-center bg-white w-full h-100 rounded-none">
        <div class="relative overflow-x-auto">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">ID</th>
                        <th scope="col" class="px-6 py-3">Name</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">Role</th>
                        <th scope="col" class="px-6 py-3">Password</th>
                        <th scope="col" class="px-6 py-3">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($role as $t)
                        <tr>
                            <form action="{{ url('update') }}" method="POST">
                                @csrf
                                <td scope="col" class="px-6 py-3">{{ $t->id }}</td>
                                <input type="hidden" name="id" value="{{ $t->id }}">
                                <td scope="col" class="px-6 py-3">
                                    <input type="text" name="name" value="{{ $t->name }}">
                                </td>
                                <td scope="col" class="px-6 py-3">
                                    <input type="text" name="email" value="{{ $t->email }}">
                                </td>
                                <td scope="col" class="px-6 py-3">
                                    <select name="role" id="">
                                        <option value="master" {{ $t->role == "master" ? 'selected' : '' }}>Master</option>
                                        <option value="admin" {{ $t->role == "admin" ? 'selected' : '' }}>Admin</option>
                                    </select>
                                </td>
                                <td scope="col" class="px-6 py-3">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                </td>
                            </form>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <br>
        <div>
            <a href="tambah_pegawai"  class="text-white bg-gradient-to-r from-cyan-400 via-cyan-500
                to-cyan-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-cyan-300
                dark:focus:ring-cyan-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Back to menu</a>
        </div>

    </main>
</x-app-layout>
