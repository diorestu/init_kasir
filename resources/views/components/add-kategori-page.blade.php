<x-offcanvas-page title="Tambah Data Kategori" id="addKategoriPage">
    <form action="{{ route('master.kategori.store') }}" method="post">
        @csrf
        @method('POST')
        <div class="mb-3">
            <label for="defaultFormControlInput" class="form-label">Judul Kategori</label>
            <input type="text" class="form-control" id="defaultFormControlInput" placeholder="Judul" name="kategori"
                aria-describedby="defaultFormControlHelp" required />
        </div>
        <div class="mb-3">
            <label for="exampleFormControlTextarea1" class="form-label">Deskripsi Kategori</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="keterangan"></textarea>
        </div>

        <button type="submit" class="btn btn-dark btn-block w-100">Submit</button>
    </form>
</x-offcanvas-page>
