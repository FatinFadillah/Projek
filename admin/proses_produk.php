<?php 
require_once 'dbkoneksi.php';
?>
<?php 
   $_nama = $_POST['nama'];
   $_stok = $_POST['stok'];
   $_harga= $_POST['harga'];
   $_berat = $_POST['berat'];
   $_jenis = $_POST['jenis'];

   $_proses = $_POST['proses'];

   // array data
   $ar_data[]=$_nama; // ? 1
   $ar_data[]=$_stok; // ? 2
   $ar_data[]=$_harga; // ? 3
   $ar_data[]=$_berat; // 4
   $ar_data[]=$_jenis; // ? 5

   if($_proses == "Simpan"){
    // data baru
    $sql = "INSERT INTO produk (nama,stok,harga,berat,
    jenis_produk_id) VALUES (?,?,?,?,?)";
   }else if($_proses == "Update"){
    $ar_data[]=$_POST['idedit'];// ? 6
    $sql = "UPDATE produk SET nama=?,stok=?,harga=?,berat=?,
    jenis_produk_id=? WHERE id=?";
   }
   if(isset($sql)){
    $st = $dbh->prepare($sql);
    $st->execute($ar_data);
   }

   header('location:list_produk.php');
?>