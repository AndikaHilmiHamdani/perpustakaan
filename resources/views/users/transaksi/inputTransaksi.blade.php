@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Input Transaksi</b>

                </header>
                <!-- <div class="box-header"> -->
                <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                <!-- </div> -->
                <div class="panel-body">
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{route('Transaksi.store')}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">ID</label>
                            <div class="col-sm-8">
                                <input name="trx_id" type="text" id="trx_id" class="form-control" placeholder="trx_id" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Buku</label>
                            <div class="col-sm-8">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">User </label>
                            <select name="user_id" class="form-control" id="user_id">
                                @foreach($user as $user)
                                <option value="{{$user->id}}" {{$transaksi->users->id?'selected' : ''}}>{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam </label>
                            <div class="col-sm-8">
                                <input name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" type="date" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali </label>
                            <div class="col-sm-8">
                                <input name="tanggal_kembali" class="form-control" id="tanggal_kembali" type="date" required />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="input-anggota.php" class="btn btn-sm btn-danger">Batal </a>
                            </div>
                        </div>
                        <div style="margin-top: 20px;"></div>
                    </form>
                </div>
            </div><!-- /.box -->
        </div>
    </div>
</section>
@endsection