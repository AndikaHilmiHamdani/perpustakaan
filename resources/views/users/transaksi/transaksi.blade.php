@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Data Anggota</b>

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
                                    <center>Id </center>
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
                                    <center>Tools</center>
                                </th>
                            </tr>
                        </thead>
                        @foreach($transaksi as $transaksi)
                        <tbody>
                            <tr>
                                <td>{{$transaksi->trx_id}}</td>
                                <td>{{$transaksi->kode_buku->judul}}</td>
                                <td>{{$transaksi->user_id}}</td>
                                <td>{{$transaksi->tanggal_pinjam}}</td>
                                <td>{{$transaksi->tanggal_kembali}}</td>
                                <td>
                                    <div id=" thanks">
                                        <form action="{{route('Transaksi.destroy',$transaksi->trx_id)}}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="submit"><span class="glyphicon glyphicon-trash"></button>
                                            <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Anggota" href="{{route('Transaksi.edit',$transaksi->trx_id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                                        </form>

                                        </span>
                                        </a>
                                </td>
                            </tr>
                </div>
                </td>
                </tr>
                </tbody>
                @endforeach
            </div>
            </tbody>
            </table>
            <div class="d-flex">

            </div>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    </div>
    </div>
    <!-- row end -->
</section><!-- /.content -->
@endsection