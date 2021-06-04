@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Input Anggota</b>

                </header>
                <!-- <div class="box-header"> -->
                <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

                <!-- </div> -->
                <div class="panel-body">
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{route('books.store')}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">kode_buku</label>
                            <div class="col-sm-8">
                                <input name="kode_buku" type="text" id="kode_buku" class="form-control" placeholder="kode_buku" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">judul</label>
                            <div class="col-sm-8">
                                <input name="judul" type="text" id="judul" class="form-control" placeholder="judul" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">pengarang</label>
                            <div class="col-sm-8">
                                <input name="pengarang" class="form-control" id="pengarang" type="text" placeholder="pengarang" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">penerbit</label>
                            <div class="col-sm-8">
                                <input name="penerbit" class="form-control" id="penerbit" type="text" placeholder="penerbit" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">stock</label>
                            <div class="col-sm-8">
                                <input name="stock" class="form-control" id="stock" type="text" placeholder="stock" required />
                            </div>
                        </div>
                        <div class="form-group" style="margin-bottom: 20px;">
                            <label class="col-sm-2 col-sm-2 control-label"></label>
                            <div class="col-sm-8">
                                <input type="submit" value="Simpan" class="btn btn-sm btn-primary" />&nbsp;
                                <a href="{{route('books.index')}}" class="btn btn-sm btn-danger">Batal </a>
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