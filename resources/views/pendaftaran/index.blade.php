<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Monitoring Pendaftaran') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white">
                <table class="table-auto w-full">
                    <thead>
                    <tr>
                        <th class="border px-6 py-4">Nama Pengunjung</th>
                        <th class="border px-6 py-4">Hubungan</th>
                        <th class="border px-6 py-4">Nama T</th>
                        <th class="border px-6 py-4">Hari</th>
                        <th class="border px-6 py-4">Waktu</th>
                        <th class="border px-6 py-4">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftaran as $item)
                            <tr>
                                <td class="border px-6 py-4 ">{{ $item->namaPengunjung }}</td>
                                <td class="border px-6 py-4 ">{{ $item->hubungan }}</td>
                                <td class="border px-6 py-4 ">{{ $item->namaT }}</td>
                                <td class="border px-6 py-4 ">{{ $item->hari }}</td>
                                <td class="border px-6 py-4 ">{{ $item->waktu }}</td>
                                <td class="border px-6 py- text-center">
                                    
                                    <form action="{{ route('pendaftaran.destroy', $item->id) }}" method="POST" class="inline-block">
                                        {!! method_field('delete') . csrf_field() !!}
                                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 mx-2 rounded inline-block">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                               <td colspan="6" class="border text-center p-5">
                                   
                               </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-5">
                {{ $pendaftaran->links() }}
            </div>
        </div>
    </div>
</x-app-layout>
