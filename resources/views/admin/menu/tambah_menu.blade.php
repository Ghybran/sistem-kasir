<x-app-layout>
    <main id="main" class="content-center bg-purple-300 w-full h-100 rounded-none">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-slate-500 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Tambah Menu') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Input new menu .') }}
                                </p>
                            </header>

                            <form method="post" action="insert" class="mt-6 space-y-6">
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif

                                @if (session('error'))
                                    <div class="alert alert-danger">
                                        {{ session('error') }}
                                    </div>
                                @endif
                                @csrf

                                <div>
                                    <x-input-label for="Nama_Menu" :value="__('Masukan Nama Menu')" />
                                    <x-text-input id="Nama_Menu" name="item" type="text" class="mt-1 block w-full" autocomplete="new-password" />
                                </div>
                                <div>
                                    <x-input-label for="Nama_Menu" :value="__('Masukan Nama Menu')" />
                                    <x-text-input id="Nama_Menu" name="price" type="number" class="mt-1 block w-full"  autocomplete="new-password" />
                                </div>

                                <div class="flex items-center gap-4">
                                    <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    @if (session('succes') === 'password-updated')
                                        <p
                                            x-data="{ show: true }"
                                            x-show="show"
                                            x-transition
                                            x-init="setTimeout(() => show = false, 2000)"
                                            class="text-sm text-gray-600 dark:text-gray-400"
                                        >{{ __('Saved.') }}</p>
                                    @endif
                                </div>
                            </form>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
