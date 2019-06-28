<?php
$separator = "\t";
// header file text
$tanggal = date('ymd');
header("Content-type: text/plain");
header("Content-Disposition: attachment; filename=$awal$akhir$cabang$username Costumer.xls");
echo "No".$separator."Tanggal Transaksi".$separator."NIK".$separator."Nama Helper/Promotor".$separator."Jabatan".$separator."Cabang".$separator."No Invoice".$separator."Nama Kasir".$separator."Nama Costumer".$separator."No. KTP".$separator."Alamat".$separator."No. HP".$separator."Email".$separator."Merek".$separator."Type".$separator."Warna".$separator."Imei \r\n";
$i=1;
foreach($data->result_array() as $row ) {
echo $i;
echo $separator.tanggal($row['tanggaltransaksi']);
echo $separator.$row['username'];
echo $separator.$row['namahelper'];
echo $separator.$row['jabatan'];
echo $separator.$row['cabang'];
echo $separator.$row['noinvoice'];
echo $separator.$row['namakasir'];
echo $separator.$row['namacostumer'];
echo $separator.$row['noktp'];
echo $separator.$row['alamat'];
echo $separator.$row['nohp'];
echo $separator.$row['email'];
echo $separator.$row['merek'];
echo $separator.$row['type'];
echo $separator.$row['warna'];
echo $separator.$row['imei'];
echo "\r\n";
$i++;
}