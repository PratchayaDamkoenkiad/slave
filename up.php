<?php 
include "connectdb.php";
$chid = $_POST['ch_id'];
$chname =$_POST['Charactersname'];
$Birthday =$_POST['Birthday'];
$Ability =$_POST['Ability'];
$Gender =$_POST['Gender'];
$race =$_POST['race'];
$BloodType =$_POST['BloodType'];
$affiliation =$_POST['affiliation'];
$occupation =$_POST['occupation'];
$Description =$_POST['Description'];
$Personality =$_POST['Personality'];
$Appearance =$_POST['Appearance'];
$image = $_POST['txtimg'];
$image1 = $_POST['txtimg1'];
$image2 = $_POST['txtimg2'];
$image3 = $_POST['txtimg3'];

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['profileimg']['tmp_name'])) {
    $new_image_name = 'cha_'.uniqid().".".pathinfo(basename($_FILES['profileimg']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./characterimg/".$new_image_name;
    move_uploaded_file($_FILES['profileimg']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "$image";
    }

if (is_uploaded_file($_FILES['img1']['tmp_name'])) {
    $new_image_name1 = 'img1_'.uniqid().".".pathinfo(basename($_FILES['img1']['name']), PATHINFO_EXTENSION);
    $image_upload_path1 = "./img/".$new_image_name1;
    move_uploaded_file($_FILES['img1']['tmp_name'],$image_upload_path1);
    } else {
    $new_image_name1 = "$image1";
    }

if (is_uploaded_file($_FILES['img2']['tmp_name'])) {
        $new_image_name2 = 'img2_'.uniqid().".".pathinfo(basename($_FILES['img2']['name']), PATHINFO_EXTENSION);
        $image_upload_path2 = "./img/".$new_image_name2;
        move_uploaded_file($_FILES['img2']['tmp_name'],$image_upload_path2);
        } else {
        $new_image_name2 = "$image2";
        }
    
if (is_uploaded_file($_FILES['img3']['tmp_name'])) {
        $new_image_name3 = 'img3_'.uniqid().".".pathinfo(basename($_FILES['img3']['name']), PATHINFO_EXTENSION);
        $image_upload_path3 = "./img/".$new_image_name3;
        move_uploaded_file($_FILES['img3']['tmp_name'],$image_upload_path3);
        } else {
        $new_image_name3 = "$image3";
        }

//คำสั่งอัปเดต
$sql ="UPDATE characters SET 
ch_name ='$chname',
Birthday ='$Birthday',
Ability ='$Ability',
Gender ='$Gender',
Race ='$race',
BloodType ='$BloodType',
Affiliation ='$affiliation',
Occupation ='$occupation',
Description ='$Description',
Personality ='$Personality',
Appearance ='$Appearance',
profile_img ='$new_image_name',
img1 ='$new_image_name1',
img2 ='$new_image_name2',
img3 ='$new_image_name3' 
WHERE ch_id ='$chid' ";

$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='edit.php'; </script>";
}else{
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
}



?>