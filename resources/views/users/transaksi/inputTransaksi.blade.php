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
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{route('Transaksi.store')}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Buku</label>
                            <div class="col-sm-8">
                                <select name="kode_buku" class="form-control" id="kode_buku">
                                    @foreach($books as $books)
                                    <option value="{{$books->kode_buku}}">{{$books->judul}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">User </label>
                            <div class="col-sm-8">
                                <input value="{{Auth::User()->name}}" name="user_name" class="form-control" id="user_name" type="input" readonly />
                            </div>
                        </div>
                        <input value="{{Auth::User()->id}}" name="user_id" class="form-control" id="user_id" type="hidden" />

                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Pinjam </label>
                            <div class="col-sm-8">
                                <input value="{{$dateNow}}" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" type="date" readonly />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Tanggal Kembali </label>
                            <div class="col-sm-8">
                                <input value="{{$fiveDays}}" name="tanggal_kembali" class="form-control" id="tanggal_kembali" type="date" readonly />
                                <input name="status_id" id="status_id" type="hidden" value="1" />
                            </div>
                        </div>


                        <div class="form-group" style="margin-bottom: 20px;">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="{{route('Transaksi.create')}}" class="btn btn-sm btn-danger">Batal </a>
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