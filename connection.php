<?php
//Koneksi Database
define("DB_HOST", "localhost:3307"); 
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "try-database-crud");

// Membuat koneksi menuju database
$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_DATABASE);

?>