@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b> Transaksi Saya</b>

                </header>
                <!-- <div class="box-header"> -->
                <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                <!-- </div> -->
                <div class="panel-body table-responsive">
                    <div class="box-tools m-b-15">
                        <form action="{{route('admin.index')}}" method="POST">
                            <form action="{{route('admin.index')}}" method="GET" role="search">
                                <div class="input-group">
                                    <input id="term" type='text' class="form-control input-sm pull-right" style="width: 150px;" name='term' placeholder='Cari berdasarkan User ID dan Username' required />
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-default" type="submit"><i class="fa fa-search"></i></button>
                                    </div>
                                </div>
                            </form>
                        </form>
                    </div>
                    <table id="example" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>No </center>
                                </th>
                                <th>
                                    <center>Id_Transaksi </center>
                                </th>
                                <th>
                                    <center>Buku </center>
                                </th>
                                <th>
                                    <center>User</center>
                                </th>
                                <th>
                                    <center>Tanggal Pinjam </center>
                                </th>
                                <th>
                                    <center>Tanggal kembali </center>
                                </th>
                                <th>
                                    <center>status </center>
                                </th>
                                <th>
                                    <center>Tools</center>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nourut = 0; ?>
                            @foreach($transaksi as $transaksi)
                            <?php $nourut++; ?>
                            <tr>
                                <td>{{$nourut}}</td>
                                <td>{{$transaksi->trx_id}}</td>
                                <td>{{$transaksi->books->judul}}</td>
                                <td>{{$transaksi->users->name}}</td>
                                <td>{{$transaksi->tanggal_pinjam}}</td>
                                <td>{{$transaksi->tanggal_kembali}}</td>
                                <td>{{$transaksi->status->status}}</td>
                                <td>
                                    <a href="kembali/{{$transaksi->trx_id}}" class=" btn btn-success btn-lg active" role="button" aria-pressed="true">kembalikan</a>
                                </td>
                            </tr>
                </div>
                </td>
                </tr>
                @endforeach
                </tbody>
            </div>
            </tbody>
            </table>
            <div class=" d-flex">

            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div>
    </div>
    <!-- row end -->
</section><!-- /.content -->
@endsection