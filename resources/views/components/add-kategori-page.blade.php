<x-offcanvas-page title="Tambah Data Barang" id="addBarangPage">
    <form action="{{ route('master.barang.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="defaultFormControlInput" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="" name="nama"
                aria-describedby="defaultFormControlHelp" required />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Keterangan Produk</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="deskripsi"></textarea>
        </div>
        <div class="mb-3">
            <label for="defaultSelect" class="form-label">Kategori Produk</label>
            <select id="defaultSelect" class="form-select" name="kategori_id">
                <option disabled selected>Pilih Satu</option>
                @foreach (App\Models\Kategori::get() as $item)
                    <option value="{{ $item->id }}">{{ $item->kategori }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="selectProduct" class="form-label">Merek Produk</label>
            <select id="selectProduct" class="form-select" name="merek_id">
                <option disabled selected>Pilih Satu</option>
                @foreach (App\Models\Merk::get() as $item)
                    <option value="{{ $item->id }}">{{ $item->merek }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-dark btn-block w-100">Submit</button>
    </form>
</x-offcanvas-page>
