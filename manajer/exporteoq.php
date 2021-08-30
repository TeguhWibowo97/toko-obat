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
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Perhitungan Economic Order Quantity</h2>
            <H3>APOTEK ALFA 99</H3>
				<div class="data-tables datatable-dark">
				<table class="table table-bordered" id="exporteoq" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th bgcolor="green">TANGGAL</th>
                                                <th bgcolor="green">NAMA BARANG</th>
                                                <th bgcolor="green">JUMLAH PESAN</th>
                                                <th bgcolor="green">BIAYA PESAN</th>
                                                <th bgcolor="green">BIAYA SIMPAN</th>
                                                <th bgcolor="green">ECONOMIC ORDER QUANTITY</th>
                                                <th bgcolor="green" >FREKUENSI</th>
                                               
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
                                    </table>
<script>
$(document).ready(function() {
    $('#exporteoq').DataTable( {
        dom: 'Bfrtip',
        buttons: [
           'excel', 'pdf', 'print'
        ]
    } );
} );

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