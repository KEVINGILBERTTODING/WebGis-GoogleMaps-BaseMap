<?php

// konfigurasi koneksi
$host       =  "localhost";
$dbuser     =  "postgres";
$dbpass     =  "12345";
$port       =  "5432";
$dbname    =  "semarang";

// script koneksi php postgree
$link = new PDO("pgsql:dbname=$dbname;host=$host", $dbuser, $dbpass); 
 
if($link)
{
    echo "Koneksi Berhasil";
}else
{
    echo "Gagal melakukan Koneksi";
}
