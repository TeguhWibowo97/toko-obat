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
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="menugudang.php">APOTEK ALFA 99</a>
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
                            <a class="nav-link" href="menugudang.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-syringe' style='font-size:24px;color:red'></i></div>
                                Beranda
                            </a>
                            <a class="nav-link" href="masuk.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-capsules' style='font-size:24px;color:purple'></i></div>
                                Barang Masuk
                            </a>
                            <a class="nav-link" href="keluar.php">
                                <div class="sb-nav-link-icon"><i class='fas fa-skull-crossbones' style='font-size:24px;color:orange'></i></div>
                                Barang Keluar
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
                        <h3 class="mt-4">BERANDA</h3>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Selamat Datang Admin Gudang Di Aplikasi Persediaan Barang Apotek ALFA 99</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    
                                </div>
                            </div>
                        </div>

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


                        <h3 class="mt-4">Stock Barang</h3>
                        <div class="card mb-4">
                            <div class="card-header">
                            <!-- Button to Open the Modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
  Tambah Barang
</button>
</div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th bgcolor="Purple">NOMER</th>
                                                <th bgcolor="Purple">NAMA BARANG</th>
                                                <th bgcolor="Purple">DESKRIPSI</th>
                                                <th bgcolor="Purple">STOCK</th>
                                                <th bgcolor="Purple">AKSI</th>
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
                                                <td> 
                                                <!-- Button to Open the Modal -->
<button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">
  Edit
</button>
<!-- Button to Open the Modal -->
<button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete<?=$idb;?>">
  Delete
</button>
                                                 </td>
                                            </tr>

                                                  <!-- Edit Modal -->
                                        <div class="modal" id="edit<?=$idb;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Edit Barang</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                                <input type="text" name="namabarang" value="<?=$namabarang;?>" class="form-control" required>
                                                <br>
                                                <Select name="deskripsi" value="<?=$deskripsi;?>" class="form-control" required>
                                                <option>Konsinasi</option>
                                                <option>Tidak Konsinasi</option></select>
                                                <br>
                                                <input type="hidden" name="idb" value="<?=$idb;?>">
                                                <button type="submit" class="btn btn-primary"name="updatebarang">Submit</button></br>
                                            </div>
                                            </form>
                                            </div>
                                            </div>
                                            </div>  

 <!-- delete Modal -->
 <div class="modal fade" id="delete<?=$idb;?>">
                                        <div class="modal-dialog">
                                            <div class="modal-content">

                                            <!-- Modal Header -->
                                            <div class="modal-header">
                                                <h4 class="modal-title">Hapus Barang?</h4>
                                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                            </div>

                                            <!-- Modal body -->
                                            <form method="post">
                                            <div class="modal-body">
                                               Apakah Anda Yakin ingin Menghapus <?=$namabarang;?>?
                                               <input type="hidden" name="idb" value="<?=$idb;?>">
                                                <br>
                                                <br>
                                                <button type="submit" class="btn btn-danger"name="hapusbarang">Hapus</button></br>
                                            </div>
                                            </form>
                                            </div>  


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

    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Barang</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        <input type="text" name="namabarang" placeholder="Nama Barang" class="form-control" required>
        <br>
        <Select name="deskripsi" placeholder="Deskripsi Barang" class="form-control" required>
        <option>Konsinasi</option>
        <option>Tidak Konsinasi</option></select>
        <br>
        <input type="number" name="stock" placeholder="Stock" Class="form-control" required>
        <br>
        <button type="submit" class="btn btn-primary"name="addnewbarang">Submit</button></br>
      </div>
      </form>
    </div>
</html>
