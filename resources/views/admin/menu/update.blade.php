<x-app-layout>
    <main id="main" class="content-center bg-purple-300 w-full h-100 rounded-none">
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                <div class="p-4 sm:p-8 bg-yellow-50 dark:bg-gray-800 shadow sm:rounded-lg">
                    <div class="max-w-xl">
                        <section>
                            <header>
                                <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ __('Update Menu') }}
                                </h2>

                                <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                                    {{ __('Update Menu.') }}
                                </p>
                            </header>

                            @foreach ($men as $item)
                            <form method="post" action="update_menu" class="mt-6 space-y-6">
                                @csrf
                                    <input type="hidden" name="id" value="{{ $item->id }}">
                                    <div>
                                        <x-input-label for="Nama_Menu" :value="__('Masukan Nama Menu')" />
                                        <x-text-input id="Nama_Menu" name="item" type="text" class="mt-1 block w-full" value="{{ $item->item }}" autocomplete="new-password" />
                                    </div>
                                    <div>
                                        <x-input-label for="Harga_Menu" :value="__('Masukan Harga Menu')" />
                                        <x-text-input id="Harga_Menu" name="price" type="number" class="mt-1 block w-full" value="{{ $item->price }}" autocomplete="new-password" />
                                    </div>
                                    <div class="flex items-center gap-4">
                                        <x-primary-button>{{ __('Save') }}</x-primary-button>
                                    </div>
                                </form>
                                @endforeach
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </main>
</x-app-layout>
