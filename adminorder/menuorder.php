<?php
require 'function.php';

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Persediaan Barang Dagang</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
        <style>
        .bg-image {
  /* The image used */
  background-image: url("b.png");

 
  /* Full height */
  height: 100%;
  

  /* Center and scale the image nicely */
  background-position: center;
  background-repeat: repeat;
  background-size: grid;
  background-color: grey;
        }
        </style>
    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="menuorder.php">APOTEK ALFA 99</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-0">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="menuorder.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-box' style='font-size:20px;color:brown'></i></div>
                                Stock Barang
                            </a>
                            <a class="nav-link" href="pesan.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-clipboard-list' style='font-size:24px;color:yellow'></i></i></div>
                               EOQ 
                            </a>
                            <a class="nav-link" href="plan.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-clipboard-list' style='font-size:24px;color:yellow'></i></i></div>
                               RAO
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            <a class="nav-link" href="">  
                            </a>
                            
                            <i class='fas fa-snowman' style='font-size:200px;color:white'></i>
                            
                                                      
                        </div>
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                    <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang Admin Order Di Aplikasi Persediaan Barang Apotek ALFA 99</li>
                        </ol>
                        <h3 class="mt-4" >Stock Barang</h3>
                        
                        <?php
                        $ambildatastock = mysqli_query($conn,"select * from stock where stock <2");

                        while ($fetch=mysqli_fetch_array($ambildatastock)){
                            $barang = $fetch['namabarang'];
                        
                        ?>
                        <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Perhatian!</strong> Stock Barang <?=$barang;?> kurang dari Dua
  </div>
<?php
                        }
?>
                        
                        <div class="card mb-4">
                        
                            <div class="card-header">
                            
</div>

                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th bgcolor="green" >NOMER</th>
                                                <th bgcolor="green">NAMA BARANG</th>
                                                <th bgcolor="green">DESKRIPSI</th>
                                                <th bgcolor="green">STOCK</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php
                                            $ambilsemuadatastock = mysqli_query($conn,"Select * from stock");
                                            $i = 1;
                                            while ($data=mysqli_fetch_array($ambilsemuadatastock)){
                                                    
                                                    $namabarang = $data['namabarang'];
                                                    $deskripsi = $data['deskripsi'];
                                                    $stock = $data['stock'];
                                                    $idb = $data['idbarang'];
                                            

                                            ?>
                                            <tr>
                                                <td><?=$i++;?></td>
                                                <td><?=$namabarang;?></td>
                                                <td><?=$deskripsi;?></td>
                                                <td><?=$stock;?></td>
                                                
                                            </tr>

                                                
                                            <?php
                                            };
                                            ?>


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
                            <div class="text-muted">Copyright &copy; Rizki Maylisa Putri</div>
                            <div>
                                <a>UNIVERSITAS SAINS DAN TEKHNOLOGI KOMPUTER</a>
                                &middot;
                                <a>SEMARANG</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
