<?php
session_start();
include 'connectdb.php';
$idch=$_GET['id'];
$sql1="DELETE FROM characters WHERE ch_id='$idch' ";
if(mysqli_query($conn,$sql1)){
    echo "<script> window.location='edit.php' </script>" ;
    $_SESSION['success'] = "ลบข้อมูลสำเร็จ";
}else{
    $_SESSION['error'] = "ลบข้อมูลไม่สำเร็จ";
    echo "Error : " .$sql1 . "<br>" . mysqli_error($conn);
}
    mysqli_close($conn);
?>