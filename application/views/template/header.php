<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Perpustakaan</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="<?= base_url('assets/js/bootstrap.min.js') ?>"></script>
    <style>
        .card-img-top:hover {

            opacity: 0.85;
            transform: scale(1.05);
            transition: transform 0.3s ease;
            cursor: pointer;
        }
    </style>

</head>

<body>
    <div class="container">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="<?= site_url() ?>"><b>Perpustakaan</b></a>
            <div class="collapse navbar-collapse">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('buku') ?>">Buku</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?= site_url('kategori') ?>">Kategori</a></li>
                </ul>

                <form method="get" action="<?= site_url('buku') ?>" class="d-flex ms-auto">
                    <input class="form-control me-2" type="search" name="keyword" placeholder="Cari buku..." value="<?= $this->input->get('keyword') ?>">
                    <select name="kategori" class="form-select me-2" style="width: auto;">
                        <option value="">Semua Kategori</option>
                        <?php foreach ($kategori as $k) : ?>
                            <option value="<?= $k->id_kategori ?>" <?= ($this->input->get('kategori') == $k->id_kategori) ? 'selected' : '' ?>>
                                <?= $k->nama_kategori ?>
                            </option>
                        <?php endforeach; ?>

                    </select>
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
            </div>
        </nav>
    </div>