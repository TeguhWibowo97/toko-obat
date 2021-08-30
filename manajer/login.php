<?php
require 'function.php';

//cek login, terdaftar tidak
if(isset($_POST['login'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    //cek data 
    $cekdatabase = mysqli_query($conn,"SELECT * FROM login where nama='$email'and password = '$password'");
    //hitung data 
    $hitung = mysqli_num_rows($cekdatabase);

    if($hitung>0){
        $_SESSION['log'] ='True';
        header('location:index.php');
    }else {
        header('location:login.php');
    };
};

if(!isset($_SESSION['log'])){

}else{
    header('location:index.php');
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>LOG IN</title>
        <link href="css/styles.css" rel="stylesheet" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h1 class="text-center font-weight-light my-4"><img src="Logo.png" style="width:60px;"></h1></div>
                                    <div class="card-body">
                                        <form method="post">
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputemail">Email</label>
                                                <input class="form-control py-4" name="email" id="inputemail" type="email" placeholder="Enter Alamat Email" />
                                            </div>
                                            <div class="form-group">
                                                <label class="small mb-1" for="inputPassword">Password</label>
                                                <input class="form-control py-4" name="password" id="inputPassword" type="password" placeholder="Enter password" />
                                            </div>
                                            <div class="form-group">
                                                <button class="btn btn-outline-primary btn-md" href="index.html" name="login">Login</button>
                                                                                                              <!-- Button to Open the Modal -->
<button type="button" class="btn btn-outline-primary btn-md" data-toggle="modal" data-target="#myModal">
  Tambah Admin
</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
           
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
    </body>
    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Tambah Admin</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <form method="post">
      <div class="modal-body">
        <input type="email" name="nama" placeholder="Email" class="form-control" required>
        <br>
        <input type="password" name="password" placeholder="password" Class="form-control" required>
        <br>
        <button type="submit" class="btn btn-primary"name="addadmin">Submit</button></br>
      </div>
      </form>
    </div>
</html>
