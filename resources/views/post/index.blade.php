<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Fitur Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    <a href="{{ route('post.create') }}">
                        <button type="button" class="border bg-gray-500 text-white rounded-md px-4 py-2 m-2" >
                            Tambah Data
                        </button>
                    </a>
                    <table class="w-full table-auto border mt-3">
                        <thead class="border-b">
                            <tr>
                                <th class="text-sm text-left font-medium text-gray-900 px-4 py-4">NO</th>
                                <th class="text-sm font-medium text-gray-900 px-4 py-4">Judul</th>
                                <th class="text-sm font-medium text-gray-900 px-4 py-4">Deskripsi</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">Diupload</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">Diupdate</th>
                                <th class="text-sm font-medium text-gray-900 px-6 py-4">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($post as $item)
                                <tr>
                                    <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap text-left">
                                        {{ $item->id }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap text-center">
                                        {{ $item->judul }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-4 py-4 whitespace-nowrap text-center">
                                        {{ $item->deskripsi }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                        {{ $item->created_at }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                        {{ $item->updated_at }}
                                    </td>
                                    <td class="text-sm text-gray-900 font-light px-6 py-4 whitespace-nowrap text-center">
                                        <form onsubmit="return confirm('Yakin mau di hapus? Data yang dihapus tidak bisa kembali');" 
                                            action="{{ route('post.destroy', $item->id) }}" method="post">

                                            {{-- tombol edit --}}
                                            <a href="{{ route('post.edit', $item->id) }}" id="{{ $item->id }}-edit-btn"
                                                class="group relative h-8 w-24 overflow-hidden rounded-lg bg-white text-lg shadow">
                                                    <div class="absolute inset-0 w-3 bg-amber-400 transition-all duration-[250ms] ease-out group-hover:w-full"></div>
                                                    <span class="relative text-black group-hover:text-white">Edit</span>
                                            </a>

                                            {{-- tombol hapus --}}
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" id="{{ $item->id }}-delete-btn"
                                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
