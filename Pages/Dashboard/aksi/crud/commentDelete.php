<?php 

require '../../../../backend/functions.php';
$cid = $_GET['id'];
$sqlDelete = "DELETE FROM testimoni WHERE cid = '$cid'";
$result = mysqli_query($koneksi,$sqlDelete);

if($result === true){
    header('Location: ../../menu/testi.php');
}else{
    header('Location: ../../menu/testi.php');
}
?>