
    <body>
        
                    <h1 style="text-align: center ;">Data Transaksi</h1>
                    <br>
                    <table>
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
                                
                            </tr>
                @endforeach
                </div>
                </td>
                </tr>
                </tbody>
            </div>
            </tbody>
            </table>
