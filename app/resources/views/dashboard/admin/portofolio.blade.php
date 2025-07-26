@extends('dashboard.admin.index')

@section('page-title', 'Portofolio')

@section('content')
    <div class="bg-white rounded-xl shadow p-6 border border-gray-200 mb-5">
        <h2 class="text-lg font-semibold text-gray-800 mb-4">Tambah Portofolio</h2>

        {{-- FORM TAMBAH PORTOFOLIO --}}
        <form action="{{ route('admin.portf.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="grid md:grid-cols-3 gap-4">
                <div class="md:col-span-1">
                    <label for="title" class="block text-sm font-semibold text-gray-700 mb-1">Judul</label>
                    <input type="text" name="title" id="title" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-500">
                </div>

                <div class="md:col-span-1">
                    <label for="description" class="block text-sm font-semibold text-gray-700 mb-1">Deskripsi</label>
                    <textarea name="description" id="description" rows="1" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-500 resize-none"></textarea>
                </div>

                <div class="md:col-span-1">
                    <label for="tipe" class="block text-sm font-semibold text-gray-700 mb-1">Tipe</label>
                    <select name="tipe" id="tipe" required
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-500">
                        <option value="">-- Pilih Tipe --</option>
                        <option value="Web">Web</option>
                        <option value="Mobile">Mobile</option>
                        <option value="Game">Game</option>
                        <option value="UI/UX">UI/UX</option>
                        <option value="Quality Assurance">Quality Assurance</option>
                        <option value="Data Scientist">Data Scientist</option>
                        <option value="Machine Learning">Machine Learning</option>
                        <option value="Cloud Architect">Cloud Architect</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>

                    <input type="text" name="tipe_custom" id="tipe_custom" placeholder="Masukkan tipe portofolio"
                        class="w-full mt-2 border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-500 hidden">
                </div>

                <div class="md:col-span-1">
                    <label for="link" class="block text-sm font-medium text-gray-700">Link Project (opsional)</label>
                    <input type="url" name="link" id="link" value="{{ old('link', $portofolio->link ?? '') }}"
                        class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:ring focus:ring-blue-500">
                </div>

                <div class="md:col-span-1">
                    <label for="image" class="block text-sm font-semibold text-gray-700 mb-1">Gambar</label>
                    <input type="file" name="image" id="image" accept="image/*" required
                        class="w-full file:bg-blue-50 file:text-blue-700 file:px-4 file:py-2 file:rounded-lg file:cursor-pointer border border-gray-300 rounded-lg">
                </div>
            </div>

            <div class="text-right mt-5">
                <button type="submit"
                    class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 transition font-semibold">Tambah</button>
            </div>
        </form>
    </div>

    {{-- NOTIFIKASI --}}
    @if (session('success'))
        <div class="bg-green-100 text-green-800 px-4 py-2 rounded mb-6">
            {{ session('success') }}
        </div>
    @endif

    {{-- LIST PORTOFOLIO --}}
    <div class="portfolio-grid mt-5 w-full">
        @forelse ($portofolios as $item)
            <div class="portfolio-card">
                <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->title }}" class="portfolio-image">
                <div class="content">
                    {{-- Form Update --}}
                    <form action="{{ route('admin.portf.update', $item->id) }}" method="POST" enctype="multipart/form-data"
                        class="space-y-2">
                        @csrf
                        @method('PUT')
                        <input type="text" name="title" value="{{ $item->title }}" required
                            class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                        <textarea name="description" rows="2" required class="border border-gray-300 rounded-lg px-4 py-2 w-full">{{ $item->description }}</textarea>
                        <select name="tipe" required class="w-full border border-gray-300 rounded-lg px-4 py-2">
                            <option value="Web" {{ $item->tipe == 'Web' ? 'selected' : '' }}>Web</option>
                            <option value="Mobile" {{ $item->tipe == 'Mobile' ? 'selected' : '' }}>Mobile</option>
                            <option value="Game" {{ $item->tipe == 'Game' ? 'selected' : '' }}>Game</option>
                            <option value="UI/UX" {{ $item->tipe == 'UI/UX' ? 'selected' : '' }}>UI/UX</option>
                            <option value="Quality Assurance" {{ $item->tipe == 'Quality Assurance' ? 'selected' : '' }}>
                                Quality Assurance</option>
                            <option value="Data Scientist" {{ $item->tipe == 'Data Scientist' ? 'selected' : '' }}>Data
                                Scientist</option>
                            <option value="Machine Learning" {{ $item->tipe == 'Machine Learning' ? 'selected' : '' }}>
                                Machine Learning</option>
                            <option value="Cloud Architect" {{ $item->tipe == 'Cloud Architect' ? 'selected' : '' }}>Cloud
                                Architect</option>
                            <option value="Lainnya" {{ $item->tipe == 'Lainnya' ? 'selected' : '' }}>Lainnya</option>
                        </select>
                        <input type="url" name="link" value="{{ $item->link }}"
                            placeholder="Link Project (opsional)"
                            class="border border-gray-300 rounded-lg px-4 py-2 w-full">
                        <input type="file" name="image" accept="image/*"
                            class="border border-gray-300 rounded-lg w-full">

                        <button type="submit" class="btn btn-yellow w-full">Update</button>
                    </form>

                    {{-- Form Hapus --}}
                    <form action="{{ route('admin.portf.delete', $item->id) }}" method="POST"
                        onsubmit="return confirm('Hapus portofolio ini?')" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-red w-full">Hapus</button>
                    </form>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-500 w-full">Belum ada data portofolio</div>
        @endforelse
    </div>
@endsection
