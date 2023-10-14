<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Form Edit Data') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{-- buat form di bawah sini --}}
                    <form method="post" action="{{ route('post.update', $data->id) }}" class="mt-6 space-y-6">
                        @csrf
                        @method('PUT')
                        <div>
                            <x-input-label for="judul" :value="__('Judul')" />
                            <x-text-input id="judul" name="judul" type="text" value="{{ $data->judul }}"  class="mt-1 block w-full"/>
                            <x-input-error class="mt-2" :messages="$errors->get('judul')" />
                        </div>
                
                        <div>
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" name="deskripsi" type="text" value="{{ $data->deskripsi }}" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('deskripsi')" />
                
                        </div>
                
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Save') }}</x-primary-button>
                
                            @if (session('status') === 'profile-updated')
                                <p
                                    x-data="{ show: true }"
                                    x-show="show"
                                    x-transition
                                    x-init="setTimeout(() => show = false, 2000)"
                                    class="text-sm text-gray-600"
                                >{{ __('Saved.') }}</p>
                            @endif
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
