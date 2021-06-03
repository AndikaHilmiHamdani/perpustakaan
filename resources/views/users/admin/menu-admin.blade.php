<ul class="sidebar-menu">
    <li class="active">
        <a href="{{route('dashboard')}}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-user"></i>
            <span>Data Anggota</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="anggota.php"><i class="fa fa-angle-double-right"></i> Data Anggota</a></li>
            <li><a href="{{route('admin.index')}}"><i class="fa fa-angle-double-right"></i> Tambah Anggota</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-book"></i>
            <span>Data Buku</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="buku.php"><i class="fa fa-angle-double-right"></i> Data Buku</a></li>
            <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Tambah Buku</a></li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-globe"></i>
            <span>Transaksi</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Data Transaksi</a></li>
            <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Transaksi Peminjaman</a></li>
            <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Input Transaksi Pinjam</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-lock"></i>
            <span>Data Admin</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="admin.php"><i class="fa fa-angle-double-right"></i> Data Admin</a></li>
            <li><a href="input-admin.php"><i class="fa fa-angle-double-right"></i> Tambah Admin</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-file"></i>
            <span>laporan</span>
            <i class="fa fa-angle-left pull-right"></i>
        </a>
        <ul class="treeview-menu">
            <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Anggota</a></li>
            <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Buku</a></li>
            <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Peminjaman Buku</a></li>
            <li><a href="404.php"><i class="fa fa-angle-double-right"></i> Laporan Pengembalian Buku</a></li>
        </ul>
    </li>
    <li>
        <a href="tentang.php">
            <i class="fa fa-envelope"></i> <span>Tentang PerPusWeb</span>
        </a>
    </li>


</ul>