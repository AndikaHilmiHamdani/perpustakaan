@extends('users.admin.layout')
@section('content')
<section class="content">

    <div class="row">
        <div class="col-xs-12">
            <div class="panel">
                <header class="panel-heading">
                    <b>Edit Buku</b>

                </header>
                <!-- <div class="box-header"> -->
                <!-- <h3 class="box-title">Responsive Hover Table</h3> -->
                <?php
                // $query = mysql_query("SELECT * FROM data_anggota WHERE id='$_GET[kd]'");
                // $data  = mysql_fetch_array($query);
                ?>
                <!-- </div> -->
                <div class="panel-body">
                    <form class="form-horizontal style-form" style="margin-top: 20px;" action="{{route('books.update',$books->kode_buku)}}" method="post" enctype="multipart/form-data" name="form1" id="form1">
                    @csrf
                    @method('PUT')
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Kode Buku</label>
                            <div class="col-sm-8">
                                <input name="kode_buku" type="text" id="kode_buku" class="form-control" placeholder="Tidak perlu di isi" value="{{$books->kode_buku}}" autofocus="on" readonly="readonly" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Judul</label>
                            <div class="col-sm-8">
                                <input name="judul" type="text" id="judul" class="form-control" placeholder="name" value="{{$books->judul}}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Pengarang</label>
                            <div class="col-sm-8">
                                <input name="pengarang" type="text" id="pengarang" class="form-control" placeholder="Ex : 00123" value="{{$books->pengarang}}" required />
                                <!--<span class="help-block">A block of help text that breaks onto a new line and may extend beyond one line.</span>-->
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Penerbit</label>
                            <div class="col-sm-8">
                                <input name="penerbit" class="form-control" id="penerbit" type="text" placeholder="Penerbit" value="{{$books->penerbit}}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Stock</label>
                            <div class="col-sm-8">
                                <input name="stock" class="form-control" id="stock" type="text" placeholder="stock" value="{{$books->stock}}" required />
                            </div>
                        </div>
                        <!-- <div class="form-group">
                            <label class="col-sm-2 col-sm-2 control-label">Foto</label>
                            <div class="col-sm-8">
                                <span class="help-block">Silahkan memilih foto untuk update atau mengedit data, tekan tombol batal untuk kembali.</span>
                                <img src="<?php //echo $data['foto']; ?>" height="250" width="250" alt="Foto Anggota" style="margin-bottom: 10px;" /><br />
                                <input name="name_file" id="name_file" type="file" />
                            </div>
                        </div> -->
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
    <!-- row end -->
</section><!-- /.content -->
@endsection