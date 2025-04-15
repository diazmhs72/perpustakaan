<div class="container mt-4">
    <h2>Detail Buku</h2>

    <div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <?php if ($buku->cover) : ?>
                    <img src="<?= base_url('uploads/' . $buku->cover) ?>" class="card-img" alt="<?= $buku->judul ?>" style="object-fit: cover; height: 100%;">
                <?php else : ?>
                    <div class="p-5 text-center text-muted">Tidak ada cover</div>
                <?php endif; ?>
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h4 class="card-title"><?= $buku->judul ?></h4>
                    <p class="card-text"><strong>Pengarang:</strong> <?= $buku->pengarang ?></p>
                    <p class="card-text"><strong>Kategori:</strong> <?= $buku->nama_kategori ?></p>
                    <p class="card-text"><strong>Sinopsis:</strong><br><?= nl2br($buku->sinopsis) ?></p>
                    <a href="<?= site_url('buku') ?>" class="btn btn-secondary mt-3">Kembali ke Daftar</a>
                </div>
            </div>
        </div>
    </div>
</div>