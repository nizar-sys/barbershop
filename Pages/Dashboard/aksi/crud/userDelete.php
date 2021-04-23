<?php 

require '../../../../backend/functions.php';
$uid = $_GET['id'];
$sqlDelete = "DELETE FROM user WHERE uid = '$uid'";
$result = mysqli_query($koneksi,$sqlDelete);

if($result === true){
    header('Location: ../../menu/dashboard.php');
}else{
    header('Location: ../../menu/dashboard.php');
}
?>