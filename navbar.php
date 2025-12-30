<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">

        <a class="navbar-brand" href="<?= base_url(); ?>">KEDAI MAMA NONI</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive"
            aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item <?= $menu == 'beranda' ? 'active' : ''; ?>">
                    <a class="nav-link" href="index.php">BERANDA</a>
                </li>
                <li class="nav-item <?= $menu == 'keranjang' ? 'active' : ''; ?>">
                    <a class="nav-link" href="cart.php">KERANJANG</a>
                </li>
                <li class="nav-item <?= $menu == 'status' ? 'active' : ''; ?>">
                    <a class="nav-link" href="status.php">CEK STATUS</a>
                </li>
                <li class="nav-item <?= $menu == 'tentang' ? 'active' : ''; ?>">
                    <a class="nav-link" href="about.php">TENTANG KAMI</a>
                </li>
                <li class="nav-item <?= $menu == 'admin' ? 'active' : ''; ?>">
                    <a class="nav-link" href="admin">ADMIN</a>
                </li>
            </ul>
        </div>
    </div>
</nav>