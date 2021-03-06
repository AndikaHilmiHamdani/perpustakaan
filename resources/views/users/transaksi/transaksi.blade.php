@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Data Transaksi</b>

                </header>
                <!-- <div class="box-header"> -->
                <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                <!-- </div> -->
                <div class="panel-body table-responsive">
                    <div class="box-tools m-b-15">
                        <form action="/transaksi/search" method="GET" role="search">
                            <div class="input-group">
                                <input id="term" type='text' value="{{ old('cari') }}" class="form-control input-sm pull-right" style="width: 150px;" name='search' placeholder='Cari berdasarkan User ID dan Username' required />
                                <div class="input-group-btn">
                                    <button class="btn btn-sm btn-default" value="CARI" type="submit"><i class="fa fa-search"></i></button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <table id="example" class="table table-hover table-bordered">
                        <thead>
                            <tr>
                                <th>
                                    <center>No </center>
                                </th>
                                <th>
                                    <center>Id</center>
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
                                @role('admin')
                                <th>
                                    <center>Tools</center>
                                </th>
                                @endrole
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
                                    <div id=" thanks">
                                        @role('admin')
                                        <form action="{{route('Transaksi.destroy',$transaksi->trx_id)}}" method="post">
                                            @csrf @method('DELETE')
                                            <button type="submit"><span class="glyphicon glyphicon-trash"></button>
                                            <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Transaksi" href="{{route('Transaksi.edit',$transaksi->trx_id)}}"><span class="glyphicon glyphicon-edit"></span></a>
                                        </form>
                                        @endrole
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