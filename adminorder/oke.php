<?php // fungsi penghitung bulan pesan

// eoq yang dimaksud adalah frekuensi pemesanan
function bulan_pesan($eoq) {
    $incremental=12/$eoq;
    // array penampung bulan pesanan
    $arr_bulan_pesan=array();
    $arr_bulan=array();

    //perulangan yg mengisi bulan pesan
    for ($i=$incremental; $i <=12; $i+=$incremental) {
        $arr_bulan_pesan[]=round($i);
    }

    //mengembalikan nilai bulan pesan.
    return $arr_bulan_pesan;
    // return $data;
}

// contoh kasus   hasil eoq = 1
echo "<br>contoh kasus   hasil eoq = 1"."<br/>";
$bulan_order_progduk1=bulan_pesan(1);

foreach ($bulan_order_progduk1 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

// contoh kasus   hasil eoq = 2
echo "<br>contoh kasus   hasil eoq = 2"."<br/>";
$bulan_order_progduk1=bulan_pesan(2);

foreach ($bulan_order_progduk1 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

// contoh kasus   hasil eoq = 3
echo "<br>contoh kasus  hasil eoq = 3"."<br/>";
$bulan_order_progduk1=bulan_pesan(3);

foreach ($bulan_order_progduk1 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

// contoh kasus   hasil eoq = 4
echo "<br>contoh kasus  hasil eoq = 4"."<br/>";
$bulan_order_progduk1=bulan_pesan(4);

foreach ($bulan_order_progduk1 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

// contoh kasus   hasil eoq = 5
echo "<br>contoh kasus  hasil eoq = 5"."<br/>";
$bulan_order_progduk1=bulan_pesan(5);

foreach ($bulan_order_progduk1 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

// contoh kasus   hasil eoq = 6
echo "<br>contoh kasus  hasil eoq = 6"."<br/>";
$bulan_order_progduk1=bulan_pesan(6);

foreach ($bulan_order_progduk1 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

//contoh kasus   hasil eoq = 7
echo "<br>contoh kasus  hasil eoq = 7"."<br/>";
$bulan_order_progduk2=bulan_pesan(7);

foreach ($bulan_order_progduk2 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

//contoh kasus   hasil eoq = 8
echo "<br>contoh kasus hasil eoq = 8"."<br/>";
$bulan_order_progduk2=bulan_pesan(8);

foreach ($bulan_order_progduk2 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

//contoh kasus   hasil eoq = 9
echo "<br>contoh kasus hasil eoq = 9"."<br/>";
$bulan_order_progduk2=bulan_pesan(9);

foreach ($bulan_order_progduk2 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

//contoh kasus   hasil eoq = 10
echo "<br>contoh kasus hasil eoq = 10"."<br/>";
$bulan_order_progduk2=bulan_pesan(10);

foreach ($bulan_order_progduk2 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

//contoh kasus   hasil eoq = 11
echo "<br>contoh kasus hasil eoq = 11"."<br/>";
$bulan_order_progduk2=bulan_pesan(11);

foreach ($bulan_order_progduk2 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

//contoh kasus   hasil eoq = 12
echo "<br>contoh kasus hasil eoq = 12"."<br/>";
$bulan_order_progduk2=bulan_pesan(12);

foreach ($bulan_order_progduk2 as $key) {
    echo "Pesan pada bulan ke-".$key."<br/>";
}

?>