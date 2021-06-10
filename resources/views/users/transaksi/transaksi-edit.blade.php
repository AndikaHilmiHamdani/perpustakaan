@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Edit Transaksi</b>

                </header>
                <!-- <div class="box-header"> -->
                <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
                <?php
                // $query = mysql_query("SELECT * FROM data_anggota WHERE id='$_GET[kd]'");
                // $data  = mysql_fetch_array($query);
                ?>
                <!-- </div> -->
                <div class="panel-body">
                    <!-- check eror -->
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{route('Transaksi.update',$transaksi->trx_id)}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Buku</label>
                            <div class="col-sm-8">
                                <input name="kode_buku" class="form-control" id="kode_buku" type="input" value="{{$transaksi->books->judul}}" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">User </label>
                            <div class="col-sm-8">
                                <input name="user_id" class="form-control" id="user_id" type="input" value="{{$transaksi->users->name}}" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam </label>
                            <div class="col-sm-8">
                                <input name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" type="date" value="{{$transaksi->tanggal_pinjam}}" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali </label>
                            <div class="col-sm-8">
                                <input name="tanggal_kembali" class="form-control" id="tanggal_kembali" type="date" value="{{$transaksi->tanggal_kembali}}" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Status </label>
                            <div class="col-sm-8">
                                <select name="status_id" class="form-control" id="status_id">
                                    @foreach($status as $status)
                                    <option value="{{$status->id}}">{{$status->status}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group" style="margin-bottom: 20px;">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="{{route('Transaksi.index')}}" class="btn btn-sm btn-danger">Batal </a>
                            </div>
                        </div>
                        <div style="margin-top: 20px;"></div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
    <!-- row end -->
</section><!-- /.content -->
@endsection