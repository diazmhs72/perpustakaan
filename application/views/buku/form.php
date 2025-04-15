<div class="container mt-4">
    <h2><?= isset($buku) ? 'Edit' : 'Tambah' ?> Buku</h2>

    <form method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label for="judul">Judul Buku</label>
            <input type="text" class="form-control" id="judul" name="judul" required value="<?= isset($buku) ? $buku->judul : '' ?>">
        </div>

        <div class="form-group">
            <label for="pengarang">Pengarang</label>
            <input type="text" class="form-control" id="pengarang" name="pengarang" required value="<?= isset($buku) ? $buku->pengarang : '' ?>">
        </div>

        <div class="form-group">
            <label for="id_kategori">Kategori</label>
            <select class="form-control" name="id_kategori" id="id_kategori" required>
                <option value="">-- Pilih Kategori --</option>
                <?php foreach ($kategori as $k) : ?>
                    <option value="<?= $k->id_kategori ?>" <?= (isset($buku) && $buku->id_kategori == $k->id_kategori) ? 'selected' : '' ?>>
                        <?= $k->nama_kategori ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-group">
            <label for="sinopsis">Sinopsis</label>
            <textarea class="form-control" id="sinopsis" name="sinopsis" rows="4"><?= isset($buku) ? $buku->sinopsis : '' ?></textarea>
        </div>

        <div class="form-group mb-3">
            <label for="cover">Cover Buku</label><br>
            <?php if (isset($buku) && $buku->cover) : ?>
                <img src="<?= base_url('uploads/' . $buku->cover) ?>" width="120" class="mb-2"><br>
            <?php endif; ?>
            <input type="file" class="form-control-file" id="cover" name="cover">
        </div>

        <button type="submit" class="btn btn-primary"><?= isset($buku) ? 'Update' : 'Simpan' ?></button>
        <a href="<?= site_url('buku') ?>" class="btn btn-secondary">Kembali</a>
    </form>
</div>