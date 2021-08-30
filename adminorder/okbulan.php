<?php
require 'function.php';


                                      
function kode($tabel, $initial){
    $struct = mysql_query("SELECT * FROM $plan");
    $field  = mysql_field_name($struct,0);
    $len    = mysql_field_len($struct,0);
    
    $qry = mysql_query("SELECT max(".$daurulang.")FROM ".$plan);
    $row = mysql_fetch_array($qry);
    
    if($row[0]==""){
       $angka=0;
    }
    else{
        $angka = substr($row[0],strlen($initial));   
    }
    
    $angka++;
    $angka =strval($angka);
    $tmp="";
    for($i=1; $i<=($len-strlen($initial)-strlen($angka)); $i++) {
        $tmp=$tmp."0";
    }
    return $initial.$tmp.$angka;
}
    ?>