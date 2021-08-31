<?php
require 'function.php';

?>
<html>

<head>
    <title>Stock Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js">
    </script>
</head>

<body>
    <div class="container">
        <h2>Perhitungan Economic Order Quantity</h2>
        <H3>APOTEK ALFA 99</H3>
        <div class="data-tables datatable-dark">
            <!-- <table class="table table-bordered" id="exporteoq" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th bgcolor="green">TANGGAL</th>
                        <th bgcolor="green">NAMA BARANG</th>
                        <th bgcolor="green">JUMLAH PESAN</th>
                        <th bgcolor="green">BIAYA PESAN</th>
                        <th bgcolor="green">BIAYA SIMPAN</th>
                        <th bgcolor="green">ECONOMIC ORDER QUANTITY</th>
                        <th bgcolor="green">FREKUENSI</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                                            $ambilsemuadatapesan = mysqli_query($conn,"Select * from pesan p, stock s where s.idbarang = p.idbarang");
                                            while ($data=mysqli_fetch_array($ambilsemuadatapesan)){
                                                    $tanggal = $data['tanggal'];
                                                    $idbarang = $data['namabarang'];
                                                    $jumlahpesan = $data['jumlahpesan'];
                                                    $biayapesan = $data['biayapesan'];
                                                    $biayasimpan = $data['biayasimpan'];
                                                    $eoq = $data['eoq'];
                                                    $frekuensi = $data['frekuensi'];
                                                    $idp = $data['idpesan'];
                                            ?>
                    <tr>
                        <td><?=$tanggal;?></td>
                        <td><?=$idbarang;?></td>
                        <td><?=$jumlahpesan;?></td>
                        <td>Rp<?=number_format($biayapesan);?></td>
                        <td>Rp.<?=number_format($biayasimpan);?></td>
                        <td><?=$eoq;?></td>
                        <td><?=$frekuensi;?></td>

                        <?php
                                            };
                                            ?>
                </tbody>
            </table> -->
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            
                                                <tr>
                                                    <th bgcolor="pink">#</th>
                                                    <th bgcolor="pink">BULAN</th>
                                                    <th bgcolor="pink">Nama Obat</th>
                                                    <th bgcolor="pink">Jumlah Pesan</th>
                                                    <th bgcolor="pink">Biaya Pesan</th>
                                                    <th bgcolor="pink">Total</th>
                                                    <th bgcolor="pink">Grand Total</th>
                                                </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $arr_januari = array();
                                                $arr_februari = array();
                                                $arr_maret = array();
                                                $arr_april = array();
                                                $arr_mei = array();
                                                $arr_juni = array();
                                                $arr_juli = array();
                                                $arr_agustus = array();
                                                $arr_september = array();
                                                $arr_oktober = array();
                                                $arr_november = array();
                                                $arr_desember = array();
                                            ?>
                                            <?php 
                                                $servername="localhost";
                                                $username="root";
                                                $password="";
                                                $dbname="stockbarang";

                                                // Create connection
                                                $conn=new mysqli($servername, $username, $password, $dbname);

                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: ". $conn->connect_error);
                                                }
                                                                                           
                                                $data="SELECT * FROM pesan LEFT JOIN stock ON stock.idbarang = pesan.idbarang";
                                                // $data="SELECT * FROM pesan ";

                                                $result=$conn->query($data);

                                                if($result->num_rows > 0) {
                                                    while ($row=$result->fetch_assoc()) {
                                                        // var_dump($row['frekuensi']);
                                                        $frekuensi = $row['frekuensi'];
                                                        $incremental = 12/$frekuensi;

                                                        for ($i=$incremental; $i <=12; $i+=$incremental) {
                                                            $round = round($i);

                                                            if($round == 1){
                                                                $arr_januari[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            }elseif($round == 2){
                                                                $arr_februari[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            }elseif($round == 3){
                                                                $arr_maret[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            }elseif($round == 4){
                                                                $arr_april[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            
                                                            }elseif($round == 5){
                                                                $arr_mei[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            
                                                            }elseif($round == 6){
                                                                $arr_juni[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            
                                                            }elseif($round == 7){
                                                                $arr_juli[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            
                                                            }elseif($round == 8){
                                                                $arr_agustus[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            
                                                            }elseif($round == 9){
                                                                $arr_september[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            
                                                            }elseif($round == 10){
                                                                $arr_oktober[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            
                                                            }elseif($round == 11){
                                                                $arr_november[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            
                                                            }elseif($round == 12){
                                                                $arr_desember[] = [
                                                                    'nama_produk' => $row['namabarang'],
                                                                    'jml_pesan' => $row['jumlahpesan'],
                                                                    'biaya_pesan' => $row['biayapesan'],
                                                                    'total' => $row['jumlahpesan']*$row['biayapesan'],
                                                                ];
                                                            }
                                                        }                                                        
                                                    }
                                                }

                                            ?>
                                            
                                            <tr>
                                                <td>1</td>
                                                <td>Januari</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_januari as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_januari as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_januari as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_januari as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_januari as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>februari</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_februari as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_februari as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_februari as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_februari as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_februari as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>maret</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_maret as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_maret as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_maret as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_maret as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_maret as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>4</td>
                                                <td>april</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_april as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_april as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_april as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_april as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_april as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>5</td>
                                                <td>mei</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_mei as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_mei as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_mei as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_mei as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_mei as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>6</td>
                                                <td>juni</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_juni as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_juni as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_juni as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_juni as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_juni as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>7</td>
                                                <td>juli</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_juli as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_juli as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_juli as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_juli as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_juli as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>8</td>
                                                <td>agustus</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_agustus as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_agustus as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_agustus as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_agustus as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_agustus as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>9</td>
                                                <td>september</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_september as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_september as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_september as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_september as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_september as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10</td>
                                                <td>Oktober</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_oktober as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_oktober as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_oktober as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_oktober as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_oktober as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>11</td>
                                                <td>november</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_november as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_november as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_november as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_november as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_november as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>12</td>
                                                <td>desember</td>
                                                <td class="text-center">
                                                    
                                                    <?php foreach($arr_desember as $arr){
                                                        echo '<span class="badge bg-primary text-white mt-2">'.$arr['nama_produk'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_desember as $arr){
                                                        echo '<span class="badge bg-warning text-white mt-2">'.$arr['jml_pesan'].'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_desember as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['biaya_pesan']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php foreach($arr_desember as $arr){ 
                                                        echo '<span class="badge bg-success text-white mt-2">Rp '.number_format($arr['total']).'</span><br>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php $grandtotal=0; foreach($arr_desember as $arr){ 
                                                        $grandtotal = $grandtotal + $arr['total'];
                                                    }
                                                    echo '<h6 class="text-success">Rp '.number_format($grandtotal).'</h6>';
                                                    ?>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
            <script>
                $(document).ready(function () {
                    $('#exporteoq').DataTable({
                        dom: 'Bfrtip',
                        buttons: [
                            'excel', 'pdf', 'print'
                        ]
                    });
                });
            </script>

            <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
            <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
            <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>



</body>

</html>