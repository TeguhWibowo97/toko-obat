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
            < !-- Navbar-->
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
                                                $arr_bln_januari = array();
                                                $arr_bln_februari = array();
                                                $arr_bln_maret = array();
                                                $arr_bln_april = array();
                                                $arr_bln_mei = array();
                                                $arr_bln_juni = array();
                                                $arr_bln_juli = array();
                                                $arr_bln_agustus = array();
                                                $arr_bln_september = array();
                                                $arr_bln_oktober = array();
                                                $arr_bln_november = array();
                                                $arr_bln_desember = array();
                                            ?>
                                            <?php $servername="localhost";
                                                $username="root";
                                                $password="";
                                                $dbname="stockbarang";

                                                // Create connection
                                                $conn=new mysqli($servername, $username, $password, $dbname);

                                                // Check connection
                                                if ($conn->connect_error) {
                                                    die("Connection failed: ". $conn->connect_error);
                                                }

                                                // echo "Connected successfully";

                                                $data="SELECT * FROM ujicoba";

                                                $result=$conn->query($data);

                                                if($result->num_rows > 0) {
                                                    while ($row=$result->fetch_assoc()) {
                                                        // echo "id : ".$row["id"]. "<br>";
                                                        
                                                        $arr_bln_januari[] = 12/$row['frekuensi'];
                                                        
                                                    }
                                                }

                                            ?>
                                            <tr>
                                                <td>1</td>
                                                <td>Januari</td>
                                                <td class="text-center"><span class="badge bg-primary text-white">yes</span>
                                                <?php echo json_encode($arr_bln_januari);?>
                                                </td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>2</td>
                                                <td>Februari</td>
                                                <td class="text-center"><span
                                                        class="badge bg-primary text-white">yes</span></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                            </tr>
                                            <tr>
                                                <td>3</td>
                                                <td>Maret</td>
                                                <td class="text-center"><span
                                                        class="badge bg-primary text-white">yes</span></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
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
                </footer><?php $servername="localhost";
$username="root";
$password="";
$dbname="stockbarang";

// Create connection
$conn=new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: ". $conn->connect_error);
}

// echo "Connected successfully";

$data="SELECT * FROM pesan";

$result=$conn->query($data);

if($result->num_rows > 0) {
    while ($row=$result->fetch_assoc()) {
        echo "idbarang : ".$row["idbarang"]. "<br>";
    }
}

?>
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