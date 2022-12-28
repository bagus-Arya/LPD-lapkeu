<?php 

function rupiah($angka){

	$hasil_rupiah = number_format($angka, 0, ',', '.');
	echo $hasil_rupiah;
 
}