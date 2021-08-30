<?php


$koneksi = mysqli_connect("localhost","root","","stockbarang");

//login
if(isset($_POST['login'])){
$username = $_POST['uname'];
$password = $_POST['psw'];

$cekuser = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
$hitung = mysqli_num_rows($cekuser);

if($hitung>0){
    //kalau data ditemukan
    $ambildatarole = mysqli_fetch_array($cekuser);
    $role = $ambildatarole['role'];
    
    if($role=='admingudang'){
        //kalau dia admingudang
        $_SESSION['log'] = 'Logged';
        $_SESSION['role'] = 'admingudang';
        header('location:admingudang/menugudang.php');

    } else {
        //kalau bukan adminorder
        $_SESSION['log'] = 'Logged';
        $_SESSION['role'] = 'adminorder';
        header('location:adminorder/menuorder.php');
    

    }
    if($role=='manajer'){
        //kalau dia admingudang
        $_SESSION['log'] = 'Logged';
        $_SESSION['role'] = 'manajer';
        header('location:manajer/manajer.php');
    } else {
        echo ' 
<script>
alert(" DATA TIDAK DI TEMUKAN !!! ");
window.location.href="";
</script>
';
    

    }


}else {
    
        //data tidak ada
echo ' 
<script>
alert(" DATA TIDAK DI TEMUKAN !!! ");
window.location.href="";
</script>
';

}

};


?>