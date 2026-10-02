<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Mahasiswa</h2>
    </x-slot>
    <div class="py-8">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white shadow-sm sm:rounded-lg p-6">
                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-800 rounded">
                        <ul class="list-disc list-inside">
                            @foreach ($errors->all() as $error)<li>{{ $error }}</li>@endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('mahasiswa.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div><label class="block font-medium text-sm text-gray-700">NIM</label>
                        <input type="text" name="nim" value="{{ old('nim') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
                    <div><label class="block font-medium text-sm text-gray-700">Nama</label>
                        <input type="text" name="nama" value="{{ old('nama') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
                    <div><label class="block font-medium text-sm text-gray-700">Program Studi</label>
                        <input type="text" name="program_studi" value="{{ old('program_studi') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
                    <div><label class="block font-medium text-sm text-gray-700">Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
                    <div><label class="block font-medium text-sm text-gray-700">Angkatan</label>
                        <input type="text" name="angkatan" value="{{ old('angkatan') }}" class="mt-1 block w-full border-gray-300 rounded-md"></div>
                    <div class="flex gap-2">
                        <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded hover:bg-indigo-700">Simpan</button>
                        <a href="{{ route('mahasiswa.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Batal</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>