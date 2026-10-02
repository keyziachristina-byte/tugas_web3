<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Data Mahasiswa</h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">{{ session('success') }}</div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if (auth()->user()->role === 'admin')
                    <a href="{{ route('mahasiswa.create') }}" class="inline-block mb-4 px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">+ Tambah Mahasiswa</a>
                @endif

                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="border-b">
                            <th class="py-2">NIM</th>
                            <th class="py-2">Nama</th>
                            <th class="py-2">Program Studi</th>
                            <th class="py-2">Email</th>
                            <th class="py-2">Angkatan</th>
                            @if (auth()->user()->role === 'admin')<th class="py-2">Aksi</th>@endif
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswas as $mhs)
                            <tr class="border-b">
                                <td class="py-2">{{ $mhs->nim }}</td>
                                <td class="py-2">{{ $mhs->nama }}</td>
                                <td class="py-2">{{ $mhs->program_studi }}</td>
                                <td class="py-2">{{ $mhs->email }}</td>
                                <td class="py-2">{{ $mhs->angkatan }}</td>
                                @if (auth()->user()->role === 'admin')
                                    <td class="py-2 space-x-2">
                                        <a href="{{ route('mahasiswa.edit', $mhs) }}" class="text-blue-600 hover:underline">Edit</a>
                                        <form action="{{ route('mahasiswa.destroy', $mhs) }}" method="POST" class="inline" onsubmit="return confirm('Hapus data ini?');">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                @endif
                            </tr>
                        @empty
                            <tr><td colspan="6" class="py-4 text-center text-gray-500">Belum ada data mahasiswa.</td></tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>