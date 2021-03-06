@extends('users.admin.layout')
@section('content')
<!-- Main content -->
<section class="content">

    <div class="row" style="margin-bottom:5px;">


        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-red"><i class="fa fa-user"></i></span>
                <div class="sm-st-info">

                    <span>{{$countUsers}}
                    </span>
                    Total Anggota
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-violet"><i class="fa fa-book"></i></span>
                <div class="sm-st-info">
                    <span>{{$countBooks}}</span>

                    Total Buku
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-blue"><i class="fa fa-refresh fa-spin fa-1x"></i></span>
                <div class="sm-st-info">
                    <span>{{$countTransaksi}}</span>
                    Total Peminjaman Buku
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="sm-st clearfix">
                <span class="sm-st-icon st-green"><i class="fa fa-group"></i></span>
                <div class="sm-st-info">
                    <?php //$tampil = mysql_query("select * from pengunjung order by id desc");
                    //$total3 = mysql_num_rows($tampil);
                    ?>
                    <span><?php //echo "$total3"; 
                            ?></span>
                    Total Pengunjung
                </div>
            </div>
        </div>
    </div>

    <!-- Main row -->
    <div class="row">

        <div class="col-md-6">
            <!--earning graph start-->
            <section class="panel">
                <header class="panel-heading">
                    Grafik Peminjaman Buku
                </header>
                <div class="panel-body">
                    <canvas id="linechart" width="600" height="330"></canvas>
                </div>
            </section>
            <!--earning graph end-->

        </div>
        <div class="col-md-6">

            <!--chat start-->
            <section class="panel">
                <header class="panel-heading">
                    Grafik Pengunjung
                    <div class="panel-body">
                        <canvas id="linechart" width="600" height="330"></canvas>
                    </div>
                </header>
            </section>
        </div>
    </div>
    <!-- row end -->
</section><!-- /.content -->
<div class="footer-main">
    Copyright &copy <a href="https://www.polinema.ac.id/" target="_blank">Perpustakaan Online</a> 2021
</div>
@endsection