<div class="container mt-4">
    <h2><?= isset($kategori) ? 'Edit' : 'Tambah' ?> Kategori</h2>

    <form method="post">
        <div class="form-group mb-3">
            <label for="nama_kategori">Nama Kategori</label>
            <input type="text" class="form-control" id="nama_kategori" name="nama_kategori" required value="<?= isset($kategori) ? $kategori->nama_kategori : '' ?>">
        </div>
        <button type="submit" class="btn btn-primary"><?= isset($kategori) ? 'Update' : 'Simpan' ?></button>
        <a href="<?= site_url('kategori') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>