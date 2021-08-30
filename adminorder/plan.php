<?php require 'function.php';

?>< !DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Persediaan Barang Dagang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet"
            crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous">
        </script>
    </head>

    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark"><a class="navbar-brand"
                href="menuorder.php">APOTEK ALFA 99</a><button class="btn btn-link btn-sm order-1 order-lg-0"
                id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            
                <ul class="navbar-nav ml-auto ml-md-0">
                    <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" id="userDropdown" href="#"
                            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i
                                class="fas fa-user fa-fw"></i></a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                            <div class="dropdown-divider"></div><a class="dropdown-item" href="logout.php">Logout</a>
                        </div>
                    </li>
                </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav"><a class="nav-link" href="menuorder.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-box'
                                        style='font-size:20px;color:brown'></i></div>Stock Barang
                            </a><a class="nav-link" href="pesan.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-clipboard-list'
                                        style='font-size:24px;color:yellow'></i></i></div>EOQ <a class="nav-link"
                                    href="plan.php">
                                    <div class="sb-nav-link-icon"><i class='fas fa-clipboard-list'
                                            style='font-size:24px;color:yellow'></i></i></div>RAO
                                </a>
                            </a><a class="nav-link" href=""></a><a class="nav-link" href=""></a><a class="nav-link"
                                href=""></a><a class="nav-link" href=""></a><a class="nav-link" href=""></a><a
                                class="nav-link" href=""></a><a class="nav-link" href=""></a><a class="nav-link"
                                href=""></a><a class="nav-link" href=""></a><a class="nav-link" href=""></a><a
                                class="nav-link" href=""></a><i class='fas fa-snowman'
                                style='font-size:200px;color:white'></i></div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h3 class="mt-4">Rencana Anggaran Order</h3>
                        <div class="card mb-4">
                            <div class="card-header"></div>
                            <div class="card-body">
                                <div class="table-responsive">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy;
                                Rizki Maylisa Putri</div>
                            <div><a>UNIVERSITAS SAINS DAN TEKHNOLOGI KOMPUTER</a>&middot;
                                <a>SEMARANG</a></div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous">
        </script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
    </form>
    </div>

    </html>