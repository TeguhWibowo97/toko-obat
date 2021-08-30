<?php
session_start();
//membuat koneksi ke database
$conn = mysqli_connect("localhost","root","","stockbarang");


//menambah Barang Baru/stock
if(isset($_POST['addnewbarang'])){
    $namabarang = $_POST['namabarang'];
    $deskripsi=$_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn,"insert into stock (namabarang, deskripsi, stock) values ('$namabarang','$deskripsi','$stock')");
    if($addtotable){
        header('location:index.php');
    } else {
        echo 'GAGAL';
        header('location:index.php');

    }
};


//menambah barang masuk
if(isset($_POST['barangmasuk'])){
$barangnya = $_POST['barangnya'];
$penerima = $_POST['penerima'];
$qty = $_POST['qty'];


$cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
$ambildatanya = mysqli_fetch_array($cekstocksekarang);
  
$stocksekarang = $ambildatanya['stock'];
$tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

$addtomasuk = mysqli_query($conn,"insert into masuk(idbarang, keterangan, qty) values ('$barangnya','$penerima','$qty')");
$updatestockmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
if($addtomasuk&&$updatestockmasuk){
    header('location:masuk.php');
} else {
    echo 'GAGAL';
    header('location:masuk.php');

}
};

//menambah barang keluar
if(isset($_POST['barangkeluar'])){
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];
    
    
    $cekstocksekarang = mysqli_query($conn,"select * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array($cekstocksekarang);
      
    $stocksekarang = $ambildatanya['stock'];

    if($stocksekarang >= $qty){
//kalau barangnya cukup
    $tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;
    $addtokeluar = mysqli_query($conn,"insert into keluar(idbarang, penerima, qty) values ('$barangnya','$penerima','$qty')");
    $updatestockmasuk = mysqli_query($conn,"update stock set stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");
    if($addtokeluar&&$updatestockmasuk){
        header('location:keluar.php');
    } else {
        echo 'GAGAL';
        header('location:keluar.php');
    }
    }else {
        //kalau barang nya gak cukup
echo ' 
<script>
alert(" Stock Saat ini Tidak Mencukupi");
window.location.href="keluar.php";
</script>
';
    }

    };

    //update barangstock
    if(isset($_POST['updatebarang'])){
        $idb= $_POST['idb'];
        $namabarang = $_POST['namabarang'];
        $deskripsi = $_POST['deskripsi'];


        $update = mysqli_query($conn,"update stock set namabarang='$namabarang',deskripsi='$deskripsi'where idbarang='$idb'");
        if($update){
            header('location:index.php');
    } else {
        echo 'GAGAL';
        header('location:index.php');
    
    }
        };


    //hapusbarangstock
    if(isset($_POST['hapusbarang'])){
        $idb= $_POST['idb'];

        $hapus = mysqli_query($conn, "delete from stock where idbarang='$idb'");
        if($hapus){
            header('location:index.php');
    } else {
        echo 'GAGAL';
        header('location:index.php');
    
    }


    };

//update barang masuk
if(isset($_POST['updatebarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idmasuk'];
    $deskripsi = $_POST['keterangan'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn,"select * from masuk where idmasuk='$idm'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
$selisih = $qty-$qtyskrg;
$kurangin = $stockskrg+$selisih;
$kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
$updatenya = mysqli_query($conn,"update masuk set qty='$qty',keterangan='$deskripsi' where idmasuk='$idm'");
if($kurangistocknya&&$updatenya){
    header('location:masuk.php');
    } else {
        echo 'GAGAL';
        header('location:masuk.php');
}

    }else{
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg-$selisih;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update masuk set qty='$qty',keterangan='$deskripsi' where idmasuk='$idm'");
        if($kurangistocknya&&$updatenya){
            header('location:masuk.php');
            } else {
                echo 'GAGAL';
                header('location:masuk.php');
        } 
    }
};

//menghapus barang masuk
if(isset($_POST['hapusbarangmasuk'])){
    $idb = $_POST['idb'];
    $idm = $_POST['idmasuk'];
    $deskripsi = $_POST['keterangan'];
    $qty = $_POST['kty'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock-$qty;


    $update = mysqli_query($conn,"update stock set stock ='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from masuk where idmasuk='$idm'");

    if($update&&$hapusdata){
        header('location:masuk.php');
    }else {
        header('location:masuk.php');
    }
};

//mengubah barang keluar
if(isset($_POST['updatebarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $lihatstock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $stocknya = mysqli_fetch_array($lihatstock);
    $stockskrg = $stocknya['stock'];

    $qtyskrg = mysqli_query($conn,"select * from keluar where idkeluar='$idk'");
    $qtynya = mysqli_fetch_array($qtyskrg);
    $qtyskrg = $qtynya['qty'];

    if($qty>$qtyskrg){
$selisih = $qty-$qtyskrg;
$kurangin = $stockskrg-$selisih;
$kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
$updatenya = mysqli_query($conn,"update keluar set qty='$qty',penerima='$penerima' where idkeluar='$idk'");
if($kurangistocknya&&$updatenya){
    header('location:keluar.php');
    } else {
        echo 'GAGAL';
        header('location:keluar.php');
}

    }else{
        $selisih = $qtyskrg-$qty;
        $kurangin = $stockskrg+$selisih;
        $kurangistocknya = mysqli_query($conn,"update stock set stock='$kurangin' where idbarang='$idb'");
        $updatenya = mysqli_query($conn,"update keluar set qty='$qty',penerima='$penerima' where idkeluar='$idk'");
        if($kurangistocknya&&$updatenya){
            header('location:keluar.php');
            } else {
                echo 'GAGAL';
                header('location:keluar.php');
        } 
    }
};

//menghapus barang Keluar
if(isset($_POST['hapusbarangkeluar'])){
    $idb = $_POST['idb'];
    $idk = $_POST['idk'];
    $qty = $_POST['kty'];

    $getdatastock = mysqli_query($conn,"select * from stock where idbarang='$idb'");
    $data = mysqli_fetch_array($getdatastock);
    $stock = $data['stock'];

    $selisih = $stock+$qty;


    $update = mysqli_query($conn,"update stock set stock ='$selisih' where idbarang='$idb'");
    $hapusdata = mysqli_query($conn,"delete from keluar where idkeluar='$idk'");

    if($update&&$hapusdata){
        header('location:keluar.php');
    }else {
        header('location:keluar.php');
    }
};

// Tambah Admin
if(isset($_POST['addadmin'])){
    $email = $_POST['nama'];
    $password=$_POST['password'];

    $queryinsert = mysqli_query($conn,"insert into login (nama, password) values ('$email','$password')");
    if($queryinsert){
        header('location:admin.php');
    } else {
        echo 'GAGAL';
        header('location:admin.php');

    }
};

//edit data admin
if(isset($_POST['updateadmin'])){
    $emailbaru = $_POST['nama'];
    $passwordbaru = $_POST['passwordbaru'];
    $idnya = $_POST['id'];

    $queryupdate = mysqli_query($conn,"update login set nama='$emailbaru',password='$passwordbaru' where iduser='$idnya'");

    if($queryupdate){
        header('location:admin.php');
    }else{
        header('location:admin.php');
    }
};

//delete admin
if(isset($_POST['hapusadmin'])){
    $id=$_POST['id'];

    $querydelete = mysqli_query($conn,"delete from login where iduser='$id'");
    if($querydelete){
        header('location:admin.php');
    }else{
        header('location:admin.php');
    }
};

//menambah pesanan
if(isset($_POST['pesan'])){
    $barangnya = $_POST['barangnya'];
    $jumlahpesan = $_POST['jumlahpesan'];
    $biayapesan = $_POST['biayapesan'];
    //otomatis biaya simpan
    $biayasimpan = $_POST['biayapesan'] * 5/100;
    //otomatis menentukan atas
    $atas = $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2;
    // otomatis menentukan bawah
$bawah = ( $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2 ) / ( $_POST['biayapesan'] * 5/100 );
// eoq
$eoq = sqrt(( $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2 ) / ( $_POST['biayapesan'] * 5/100 ));
//frekuensi pemesanan
$frekuensi = $_POST['jumlahpesan']/sqrt(( $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2 ) / ( $_POST['biayapesan'] * 5/100 ));
//daurulangpemesanan
$daurulang = 365 / $frekuensi;
//menambahkan total otomatis
$total = $_POST['jumlahpesan'] * $_POST['biayapesan'];
//tambah bulan
$bulan = $daurulang / 30;




//menambahkan ke database
$cek = mysqli_num_rows(mysqli_query($conn,"SELECT * FROM pesan WHERE idbarang ='$barangnya'"));
if ($cek>=1){
echo "<script>window.alert('DATA YANG ANDA MASUKAN SUDAH ADA')
window.location='pesan.php'</script>";
}else {
    mysqli_query($conn,"insert into pesan (idbarang, jumlahpesan, biayapesan, biayasimpan, eoq, atas, bawah, frekuensi, daurulang, bulan) values ('$barangnya','$jumlahpesan','$biayapesan','$biayasimpan','$eoq','$atas','$bawah','$frekuensi','$daurulang','$bulan')");
    mysqli_query($conn,"insert into plan (idbarang, jumlahpesan, biayapesan, total,frekuensi, daurulang) values ('$barangnya','$jumlahpesan','$biayapesan','$total','$frekuensi','$daurulang')");
    echo "<script>window.alert('DATA SUDAH DISIMPAN')
window.location='pesan.php'</script>";
}//perulangan
    

};

//edit perhitungan eoq
if(isset($_POST['eoq'])){
    $idp = $_POST['idpesan'];
    $jumlahpesan = $_POST['jumlahpesan'];
    $idbarang = $_POST['namabarang'];
    $biayapesan = $_POST['biayapesan'];
    //otomatis biaya simpan
    $biayasimpan = $_POST['biayapesan'] * 5/100;
    //otomatis menentukan atas
    $atas = $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2;
    // otomatis menentukan bawah
$bawah = ( $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2 ) / ( $_POST['biayapesan'] * 5/100 );
// eoq
$eoq = sqrt(( $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2 ) / ( $_POST['biayapesan'] * 5/100 ));
//frekuensi pemesanan
$frekuensi = $_POST['jumlahpesan']/sqrt(( $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2 ) / ( $_POST['biayapesan'] * 5/100 ));
//daurulangpemesanan
$daurulang = 365 / ($_POST['jumlahpesan']/sqrt(( $_POST['jumlahpesan'] * $_POST['biayapesan'] * 2 ) / ( $_POST['biayapesan'] * 5/100 )));
//menambahkan total otomatis
$total = $_POST['jumlahpesan'] * $_POST['biayapesan'];






//update
    $eoq = mysqli_query($conn,"update pesan set jumlahpesan='$jumlahpesan',biayapesan='$biayapesan',biayasimpan='$biayasimpan',eoq='$eoq',frekuensi='$frekuensi' where idpesan='$idp'");
    if($eoq){
        header('location:pesan.php');
} else {
    echo 'GAGAL';
    header('location:pesan.php');

}
    };


//RAO
if(isset($_POST['rao'])){
    $idplan= $_POST['idplan'];
    $bulan = $_POST['bulan'];
    $idbarang = $_POST['namabarang'];
    $frekuensi = $_POST['frekuensi'];
    $bulan2 = $_POST['bulan2'];
    $bulan3 = $_POST['bulan3'];
    $bulan4 = $_POST['bulan4'];
    $bulan5 = $_POST['bulan5'];
    $bulan6 = $_POST['bulan6'];
    $bulan7 = $_POST['bulan7'];
    $bulan8 = $_POST['bulan8'];
    $bulan9 = $_POST['bulan9'];
    $bulan10 = $_POST['bulan10'];
    $bulan11= $_POST['bulan11'];
    $bulan12 = $_POST['bulan12'];
    


   


    $update = mysqli_query($conn,"update plan set frekuensi='$frekuensi',bulan='$bulan',bulan2='$bulan2',bulan3='$bulan3' where idplan='$idplan'");
    if($update){
        header('location:plan.php');
} else {
    echo 'GAGAL';
    header('location:plan.php');

}
    };






?>

