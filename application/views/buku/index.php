<div class="container mt-4">
    <h3>Daftar Buku</h3>

    <a href="<?= site_url('buku/tambah') ?>" class="btn btn-info ml-2 mb-3">Tambah Buku</a>

    <div class="row">
        <?php if (empty($buku)) : ?>
            <div class="col-12">
                <div class="alert alert-warning">Buku tidak ditemukan.</div>
            </div>
        <?php else : ?>
            <?php foreach ($buku as $b) : ?>
                <div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card h-100">
                        <?php if ($b->cover) : ?>
                            <a href="<?= site_url('buku/detail/' . $b->id_buku) ?>">
                                <div class="d-flex justify-content-center align-items-center" style="height: 200px;">
                                    <img src="<?= base_url('uploads/' . $b->cover) ?>" class="card-img-top" style="object-fit: cover; width: 140px; height: 200px;">
                                </div>
                            </a>
                        <?php else : ?>
                            <div class="p-5 text-center text-muted">Tidak ada cover</div>
                        <?php endif; ?>
                        <div class="card-body d-flex flex-column">
                            <h6 class="card-title text-truncate" title="<?= $b->judul ?>"><?= $b->judul ?></h6>
                            <p class="card-text mb-1"><strong>Pengarang:</strong> <?= $b->pengarang ?></p>
                            <p class="card-text"><span class="badge badge-info"><?= $b->nama_kategori ?></span></p>
                            <div class="mt-auto">
                                <a href="<?= site_url('buku/edit/' . $b->id_buku) ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="<?= site_url('buku/hapus/' . $b->id_buku) ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin mau hapus?')">Hapus</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>