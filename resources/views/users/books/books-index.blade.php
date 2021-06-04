@extends('users.admin.layout')
@section('content')
<section class="content">

  <div class="row">
    <div class="col-xs-12">
      <div class="panel">
        <header class="panel-heading">
          <b>Data Buku</b>

        </header>
        <!-- <div class="box-header"> -->
        <!-- <h3 class="box-title">Responsive Hover Table</h3> -->

        <!-- </div> -->
        <div class="panel-body table-responsive">
          <div class="box-tools m-b-15">
            <form action="{{route('books.index')}}" method="POST">
              <form action="{{route('books.index')}}" method="GET" role="search">
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
                  <center>Kode Buku </center>
                </th>
                <th>
                  <center>judul </center>
                </th>
                <th>
                  <center>pengarang</center>
                </th>
                <th>
                  <center>penerbit </center>
                </th>
                <th>
                  <center>Stock </center>
                </th>
              </tr>
            </thead>
            @foreach($books as $book)
              <tbody>
                <tr>
                  <td>{{$book->kode_buku}}</td>
                  <td>{{$book->judul}}</a></td>
                  <td>{{$book->pengarang}}</td>
                  <td>{{$book->penerbit}}</td>
                  <td>{{$book->stock}}</td>
                  <td>
                    <center>
                      <div id="thanks">
                      <form action="{{route('books.destroy',$book->kode_buku)}}" method="post">
                        @csrf @method('DELETE')
                        <button type="submit"><span class="glyphicon glyphicon-trash"></button>
                        <a class="btn btn-sm btn-primary" data-placement="bottom" data-toggle="tooltip" title="Edit Anggota" href="{{route('books.edit',$book->kode_buku)}}"><span class="glyphicon glyphicon-edit"></span></a>
                      </form>
                      </div>
                    </center>
                  </td>
                </tr>
              </tbody>
              @endforeach
        </div>
      </tbody>
      </table>
      <div class="d-flex">
        {{ $books->appends(request()->term)->links('pagination::bootstrap-4') }}
      </div>
      </div><!-- /.box-body -->
    </div><!-- /.box -->
  </div>
  </div>
  <!-- row end -->
</section><!-- /.content -->
@endsection