<div class="container mt-4">
    <h2>Manajemen Kategori</h2>

    <a href="<?= site_url('kategori/tambah') ?>" class="btn btn-success mb-3">Tambah Kategori</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($kategori as $k) : ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td><?= $k->nama_kategori ?></td>
                    <td>
                        <a href="<?= site_url('kategori/edit/' . $k->id_kategori) ?>" class="btn btn-warning btn-sm">Edit</a>
                        <a href="<?= site_url('kategori/hapus/' . $k->id_kategori) ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                    </td>
                </tr>
            <?php endforeach ?>
        </tbody>
    </table>
</div>