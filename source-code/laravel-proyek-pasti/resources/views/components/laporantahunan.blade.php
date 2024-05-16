<link href="{{ asset('/css/argon-dashboard.css?v=1.1.2') }}" rel="stylesheet" /> 
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
<div class="col-12 shadow-sm rounded mt-0 bg-white p-0">
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
                            <th scope="col">Jumlah(Rp)</th> 
                            <th scope="col" style="text-align:center">Volume(Kali)</th>                      
                        </tr>   
                    </thead>
                        
                    <tbody style="border-left: solid 1px;border-right: solid 1px">
                    
                            <tr>                              
                                <td>Persembahan</td>
                                @foreach ($laporantahunan1 as $laporan1)
                                <td><?php 
                                    $angka =$laporan1 -> total;
                                    echo "Rp." . number_format( $angka , 2, ",", ".");?>
                                </td>                             
                                @endforeach
                                @foreach ($totalkategori1 as $kategori1)
                                <td style="text-align:center">{{ $kategori1->total }}</td>                             
                                @endforeach 
                            </tr>
                    

                    
                            <tr>                              
                                <td>Bakti Bulanan dan Pembangunan</td>
                                @foreach ($laporantahunan2 as $laporan2)
                                <td><?php 
                                    $angka =$laporan2 -> total;
                                    echo "Rp." . number_format( $angka , 2, ",", ".");?>
                                    </td> 
                                @endforeach
                                @foreach ($totalkategori2 as $kategori2)
                                <td style="text-align:center">{{ $kategori2->total }}</td>                             
                                @endforeach                              
                            </tr>
                            <tr>                              
                                <td>Administrasi</td>
                                @foreach ($laporantahunan3 as $laporan3)
                                <td><?php 
                                    $angka =$laporan3 -> total;
                                    echo "Rp." . number_format( $angka , 2, ",", ".");?>
                                    </td>
                                @endforeach
                                @foreach ($totalkategori3 as $kategori3)
                                <td style="text-align:center">{{ $kategori3->total }}</td>                             
                                @endforeach                               
                            </tr>
                            <tr>                              
                                <td>Ucapan Syukur</td>
                                @foreach ($laporantahunan4 as $laporan4)
                                <td><?php 
                                    $angka =$laporan4 -> total;
                                    echo "Rp." . number_format( $angka , 2, ",", ".");?>
                                    </td>  
                                    @endforeach 
                                    @foreach ($totalkategori4 as $kategori4)
                                <td style="text-align:center">{{ $kategori4->total }}</td>                             
                                @endforeach                            
                            </tr>
                            <tr>                              
                                <td>Penggalangan Dana</td>
                                @foreach ($laporantahunan5 as $laporan5)
                                <td><?php 
                                    $angka =$laporan5 -> total;
                                    echo "Rp." . number_format( $angka , 2, ",", ".");?>
                                </td>
                                @endforeach
                                @foreach ($totalkategori5 as $kategori5)
                                <td style="text-align:center">{{ $kategori5->total }}</td>                             
                                @endforeach                               
                            </tr>
                     
                            <tr>                              
                                <td>Penggalangan Dana Eksternal</td>
                                @foreach ($laporantahunan6 as $laporan6)
                                <td><?php 
                                    $angka =$laporan6 -> total;
                                    echo "Rp." . number_format( $angka , 2, ",", ".");?>
                                </td> 
                                @endforeach 
                                @foreach ($totalkategori6 as $kategori6)
                                <td style="text-align:center">{{ $kategori6->total }}</td>                             
                                @endforeach                             
                            </tr>
                     
                     <tr  style="border-bottom: solid 1px;">
                        <th scope="col">Total</th>
                        @foreach ($totalpemasukan as $jumlah)
                        <th scope="col"><?php 
                        $angka =$jumlah -> total;
                        echo "Rp." . number_format( $angka , 2, ",", ".");?> 
                        </th> 
                        @endforeach 
                           
                    </tr>
                    
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
                            <th scope="col">Jumlah(Rp)</th> 
                            <th scope="col" style="text-align:center">Volume(Kali)</th>                        
                        </tr>
                        
                        
                    </thead>
                        
                    <tbody style="border-left: solid 1px;border-right: solid 1px">
                            <tr>                              
                                <td>Biaya Pelayanan Rutin</td>
                                @foreach ($laporantahunan7 as $laporan7)
                                <td><?php $angka = $laporan7 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>
                                    @endforeach  
                                    @foreach ($totalkategori7 as $kategori7)
                                <td style="text-align:center">{{ $kategori7->total }}</td>                             
                                @endforeach                             
                            </tr>
                    
                            <tr>                              
                                <td>Operasional Gereja</td>
                                @foreach ($laporantahunan8 as $laporan8)
                                <td><?php $angka = $laporan8 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>
                                @endforeach
                                @foreach ($totalkategori8 as $kategori8)
                                <td style="text-align:center">{{ $kategori8->total }}</td>                             
                                @endforeach                               
                            </tr>
                    
                            <tr>                              
                                <td>Tahun Gerejawi dan Ulang Tahun Gereja</td>
                                @foreach ($laporantahunan9 as $laporan9)
                                <td><?php 
                                    $angka = $laporan9 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td> 
                                @endforeach   
                                @foreach ($totalkategori9 as $kategori9)
                                <td style="text-align:center">{{ $kategori9->total }}</td>                             
                                @endforeach                           
                            </tr>
                    
                            <tr>                              
                                <td>Pembangunan</td>
                                @foreach ($laporantahunan10 as $laporan10)
                                <td><?php 
                                    $angka = $laporan10 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                    </td>
                                @endforeach    
                                @foreach ($totalkategori10 as $kategori10)
                                <td style="text-align:center">{{ $kategori10->total }}</td>                             
                                @endforeach                           
                            </tr>
                    
                            <tr>                              
                                <td>Penggalangan Dana</td>
                                @foreach ($laporantahunan11 as $laporan11)
                                <td><?php 
                                    $angka = $laporan11 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach  
                                @foreach ($totalkategori11 as $kategori11)
                                <td style="text-align:center">{{ $kategori11->total }}</td>                             
                                @endforeach                             
                            </tr>
                    
                            <tr>                              
                                <td>Diakonia</td>
                                @foreach ($laporantahunan12 as $laporan12)
                                <td><?php 
                                    $angka = $laporan12 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach    
                                @foreach ($totalkategori12 as $kategori12)
                                <td style="text-align:center">{{ $kategori12->total }}</td>                             
                                @endforeach                           
                            </tr>          
                    
                            <tr>                              
                                <td>Pendidikan</td>
                                @foreach ($laporantahunan13 as $laporan13)
                                <td><?php 
                                    $angka = $laporan13 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach       
                                @foreach ($totalkategori13 as $kategori13)
                                <td style="text-align:center">{{ $kategori13->total }}</td>                             
                                @endforeach                        
                            </tr>
                    
                            <tr>                              
                                <td>Seksi Nyanyian dan Koor</td>
                                @foreach ($laporantahunan14 as $laporan14)
                                <td><?php 
                                    $angka = $laporan14 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach     
                                @foreach ($totalkategori14 as $kategori14)
                                <td style="text-align:center">{{ $kategori14->total }}</td>                             
                                @endforeach                          
                            </tr>
                    
                            <tr>                              
                                <td>Pembinaan Kategorial</td>
                                @foreach ($laporantahunan15 as $laporan15)
                                <td><?php 
                                    $angka = $laporan15 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach     
                                @foreach ($totalkategori15 as $kategori15)
                                <td style="text-align:center">{{ $kategori15->total }}</td>                             
                                @endforeach                          
                            </tr>
                     
                            <tr>                              
                                <td>Biaya Natal dan Akhir Tahun</td>
                                @foreach ($laporantahunan16 as $laporan16)
                                <td><?php 
                                    $angka = $laporan16 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach     
                                @foreach ($totalkategori16 as $kategori16)
                                <td style="text-align:center">{{ $kategori16->total }}</td>                             
                                @endforeach                          
                            </tr>
        
                            <tr>                              
                                <td>Pihak Lain</td>
                                @foreach ($laporantahunan17 as $laporan17)
                                <td><?php 
                                    $angka = $laporan17 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach     
                                @foreach ($totalkategori17 as $kategori17)
                                <td style="text-align:center">{{ $kategori17->total }}</td>                             
                                @endforeach                          
                            </tr>
                    
                            <tr>                              
                                <td>Hari Besar Gereja</td>
                                @foreach ($laporantahunan18 as $laporan18)
                                <td><?php 
                                    $angka = $laporan18 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach      
                                @foreach ($totalkategori18 as $kategori18)
                                <td style="text-align:center">{{ $kategori18->total }}</td>                             
                                @endforeach                         
                            </tr>
                    
                            <tr>                              
                                <td>Pembangunan Jangka Panjang</td>
                                @foreach ($laporantahunan19 as $laporan19)
                                <td><?php 
                                    $angka = $laporan19 -> total;
                                    echo "Rp." . number_format( $angka, 2, ",", ".");?>
                                </td>
                                @endforeach       
                                @foreach ($totalkategori19 as $kategori19)
                                <td style="text-align:center">{{ $kategori19->total }}</td>                             
                                @endforeach                        
                            </tr>
                   
                    <tr style="border-bottom: solid 1px;">
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
            <table class="table" >
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