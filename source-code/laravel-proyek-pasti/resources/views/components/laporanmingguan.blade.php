<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" /> 
<div class="col-12 shadow-sm rounded mt-0 bg-white p-0">
    @foreach ($namalaporan as $laporan)
        <h2 style="text-align:center; margin-bottom: 30px"><b>{{ $laporan -> nama_laporan }}</b></h2>
        <div class="col-5 mt-0">
            <b><?php 
            $angka =$laporan->saldo_sebelum;
            echo "Saldo Awal : Rp." . number_format( $angka , 2, ",", ".");
            ?></b>
        </div>
        <div class="col-5 mt-0">
         <b>
         @foreach( $totalpemasukan as $pemasukan)
            @foreach ($totalpengeluaran as $pengeluaran)
        <?php 
        $angka1 =$laporan -> saldo_sebelum;
            $angka2 = $pemasukan -> total;
            $angka3 = $pengeluaran -> total;
        $angka4 = $angka1 + $angka2 - $angka3;
        echo "Saldo Akhir : Rp." . number_format( $angka4 , 2, ",", ".");
        ?>
            @endforeach
        @endforeach
         </b>                            
        </div>
    <div class="row">
        <div class="col-2 mt-0">

        </div>
        <div class="col-8 mt-0">   
                <table class="table" style="margin-bottom: 80px" >
                    <thead>
                        <tr>
                            <h3 style="text-align:center"><b>Laporan Pemasukan</b></h3>
                        </tr>
                        <tr>
                            <th scope="col">Kategori Keuangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah(Rp)</th>                       
                        </tr>   
                    </thead>
                        
                    <tbody style="border-left: solid 1px;border-right: solid 1px">
                    <tr>
                            <th scope="col">Persembahan</th>     
                    </tr>
                    @foreach ($laporanmingguan1 as $laporan1)
                            <tr>                              
                                <td>{{ $laporan1 -> keterangan}}</td>
                                <td>{{ $laporan1 -> tanggal}}</td>
                                <td><?php $angka = $laporan1 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>                              
                            </tr>
                    @endforeach
                    <tr>
                        <th scope="col">Bakti Bulanan dan Pembangunan</th>     
                    </tr>
                    @foreach ($laporanmingguan2 as $laporan2)
                            <tr>                              
                                <td>&ensp;{{ $laporan2 -> keterangan}}</td>
                                <td>{{ $laporan2 -> tanggal}}</td>
                                <td><?php $angka = $laporan2 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>                              
                            </tr>
                     @endforeach
                     <tr>
                        <th scope="col">Administrasi</th>     
                    </tr>
                    @foreach ($laporanmingguan3 as $laporan3)
                            <tr>                              
                                <td>&ensp;{{ $laporan3 -> keterangan}}</td>
                                <td>{{ $laporan3 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan3 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>                              
                            </tr>
                     @endforeach
                    <tr>
                        <th scope="col">Ucapan Syukur</th>     
                    </tr>
                    @foreach ($laporanmingguan4 as $laporan4)
                            <tr>                              
                                <td>{{ $laporan4 -> keterangan}}</td>
                                <td>{{ $laporan4 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan4 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>                              
                            </tr>
                     @endforeach
                    <tr>
                        <th scope="col">Penggalangan Dana</th>     
                    </tr>
                    @foreach ($laporanmingguan5 as $laporan5)
                            <tr>                              
                                <td>{{ $laporan5 -> keterangan}}</td>
                                <td>{{ $laporan5 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan5 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach
                    <tr>
                        <th scope="col">Penggalangan Dana Eksternal</th>     
                    </tr>
                    @foreach ($laporanmingguan6 as $laporan6)
                            <tr>                              
                                <td>{{ $laporan6 -> keterangan}}</td>
                                <td>{{ $laporan6 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan6 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach
                     <tr  style="border-bottom: solid 1px;">
                    @foreach ($totalpemasukan as $jumlah)
                        <th scope="col"></th>
                        <th scope="col">Total</th>
                        <th scope="col"><?php 
                        $angka =$jumlah -> total;
                        echo "Rp." . number_format( $angka , 2, ",", ".");
                        ?> </th>     
                    </tr>
                    @endforeach
                    </tbody>
                </table>
    </div>
    </div>
    
    <div class="row">
        <div class="col-2 mt-0">
        </div>
    <div class="col-8 mt-1" >    
                <table class="table" border-left="1" >
                    <thead>
                        <tr>
                            <h3 style="text-align:center"><b>Laporan Pengeluaran</b></h3>
                        </tr>
                        <tr>
                            <th scope="col">Kategori Keuangan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jumlah(Rp)</th>                       
                        </tr>
                        
                        
                    </thead>
                        
                    <tbody style="border-left: solid 1px;border-right: solid 1px">
                    <tr>
                            <th scope="col">Biaya Pelayanan Rutin</th>     
                    </tr>
                    @foreach ($laporanmingguan7 as $laporan7)
                            <tr>                              
                                <td>{{ $laporan7 -> keterangan}}</td>
                                <td>{{ $laporan7 -> tanggal}}</td>
                                <td><?php $angka = $laporan7 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>                              
                            </tr>
                    @endforeach
                    <tr>
                        <th scope="col">Operasional Gereja</th>     
                    </tr>
                    @foreach ($laporanmingguan8 as $laporan8)
                            <tr>                              
                                <td>{{ $laporan8 -> keterangan}}</td>
                                <td>{{ $laporan8 -> tanggal}}</td>
                                <td><?php $angka = $laporan8 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>                              
                            </tr>
                     @endforeach
                     <tr>
                        <th scope="col">Tahun Gerejawi dan Ulang Tahun Gereja</th>     
                    </tr>
                    @foreach ($laporanmingguan9 as $laporan9)
                            <tr>                              
                                <td>{{ $laporan9 -> keterangan}}</td>
                                <td>{{ $laporan9 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan9 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>                              
                            </tr>
                     @endforeach
                    <tr>
                        <th scope="col">Pembangunan</th>     
                    </tr>
                    @foreach ($laporanmingguan10 as $laporan10)
                            <tr>                              
                                <td>{{ $laporan10 -> keterangan}}</td>
                                <td>{{ $laporan10 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan10 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>                              
                            </tr>
                     @endforeach
                    <tr>
                        <th scope="col">Penggalangan Dana</th>     
                    </tr>
                    @foreach ($laporanmingguan11 as $laporan11)
                            <tr>                              
                                <td>{{ $laporan11 -> keterangan}}</td>
                                <td>{{ $laporan11 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan11 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach
                    <tr>
                        <th scope="col">Diakonia</th>     
                    </tr>
                    @foreach ($laporanmingguan12 as $laporan12)
                            <tr>                              
                                <td>{{ $laporan12 -> keterangan}}</td>
                                <td>{{ $laporan12 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan12 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach
                     
                     <tr>
                        <th scope="col">Pendidikan</th>     
                    </tr>
                    @foreach ($laporanmingguan13 as $laporan13)
                            <tr>                              
                                <td>{{ $laporan13 -> keterangan}}</td>
                                <td>{{ $laporan13 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan13 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach
                     
                     <tr>
                        <th scope="col">Seksi Nyanyian dan Koor</th>     
                    </tr>
                    @foreach ($laporanmingguan14 as $laporan14)
                            <tr>                              
                                <td>{{ $laporan14 -> keterangan}}</td>
                                <td>{{ $laporan14 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan14 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach

                     <tr>
                        <th scope="col">Pembinaan Kategorial</th>     
                    </tr>
                    @foreach ($laporanmingguan15 as $laporan15)
                            <tr>                              
                                <td>{{ $laporan15 -> keterangan}}</td>
                                <td>{{ $laporan15 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan15 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach

                     <tr>
                        <th scope="col">Biaya Natal dan Akhir Tahun</th>     
                    </tr>
                    @foreach ($laporanmingguan16 as $laporan16)
                            <tr>                              
                                <td>{{ $laporan16 -> keterangan}}</td>
                                <td>{{ $laporan16 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan16 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach

                     <tr>
                        <th scope="col">Pihak Lain</th>     
                    </tr>
                    @foreach ($laporanmingguan17 as $laporan17)
                            <tr>                              
                                <td>{{ $laporan17 -> keterangan}}</td>
                                <td>{{ $laporan17 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan17 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach

                     <tr>
                        <th scope="col">Hari Besar Gereja</th>     
                    </tr>
                    @foreach ($laporanmingguan18 as $laporan18)
                            <tr>                              
                                <td>{{ $laporan18 -> keterangan}}</td>
                                <td>{{ $laporan18 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan18 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach

                     <tr>
                        <th scope="col">Pembangunan Jangka Panjang</th>     
                    </tr>
                    @foreach ($laporanmingguan19 as $laporan19)
                            <tr>                              
                                <td>{{ $laporan19 -> keterangan}}</td>
                                <td>{{ $laporan19 -> tanggal}}</td>
                                <td><?php 
                                    $angka = $laporan19 -> nominal;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>                              
                            </tr>
                     @endforeach
                    <tr style="border-bottom: solid 1px;">
                        <th scope="col"></th>
                        <th scope="col">Total</th>
                        @foreach ($totalpengeluaran as $jumlah)
                        <th scope="col"><?php 
                        $angka =$jumlah -> total;
                        echo "Rp." . number_format( $angka , 2, ",", ".");
                        ?> </th>
                        @endforeach     
                    </tr>
                    </tbody>
                </table>
                <div>
                <h2 style="text-align:center; margin-bottom: 30px;margin-top: 80px;"><b>Saldo Akhir</b></h2>
                <table class="table"  >
                <tr >
                        
                        <th scope="col">Saldo Awal</th>
                        <th scope="col"><?php 
                        $angka =$laporan -> saldo_sebelum;
                        echo "Rp." . number_format( $angka , 2, ",", ".");
                        ?> </th>    
                    </tr> 
                <tr >
                    @foreach ($totalpemasukan as $jumlah)
                    
                        <th scope="col">Total Pemasukan</th>
                        <th scope="col"><?php 
                        $angka =$jumlah -> total;
                        echo "Rp." . number_format( $angka , 2, ",", ".");
                        ?> </th>  
                    @endforeach   
                    </tr>
                    <tr style="border-bottom:solid 1px">
                    @foreach ($totalpengeluaran as $jumlah)
                        
                        <th scope="col">Total Pengeluaran</th>
                        <th scope="col"><?php 
                        $angka =$jumlah -> total;
                        echo "Rp." . number_format( $angka , 2, ",", ".");
                        ?> </th>  
                    @endforeach   
                </tr>                   
                <tr>
                        
                        <th scope="col">Saldo Akhir</th>
                    @foreach( $totalpemasukan as $pemasukan)
                        <th scope="col">
                            @foreach ($totalpengeluaran as $pengeluaran)
                        <?php 
                        $angka1 =$laporan -> saldo_sebelum;
                         $angka2 = $pemasukan -> total;
                         $angka3 = $pengeluaran -> total;
                        $angka4 = $angka1 + $angka2 - $angka3;
                        echo "Rp." . number_format( $angka4 , 2, ",", ".");
                        ?>
                            @endforeach
                        </th> 
                     @endforeach    
                    </tr>
                    @endforeach
                </table>
                </div>
        </div>
        </div>
</div>