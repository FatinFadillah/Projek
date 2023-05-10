<?php 
require_once 'dbkoneksi.php';
?>
<?php 
   $_nama = $_POST['jenis_produk'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_nama; // ? 1

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO jenis_produk (jenis_produk) VALUES (?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 2
    $sql = "UPDATE jenis_produk SET jenis=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:list_jenis_produk.php');
?>