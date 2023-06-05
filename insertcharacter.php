<?php 
include "connectdb.php";
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

//อัพโหลดรูปภาพ
if (is_uploaded_file($_FILES['profileimg']['tmp_name'])) {
    $new_image_name = 'cha_'.uniqid().".".pathinfo(basename($_FILES['profileimg']['name']), PATHINFO_EXTENSION);
    $image_upload_path = "./characterimg/".$new_image_name;
    move_uploaded_file($_FILES['profileimg']['tmp_name'],$image_upload_path);
    } else {
    $new_image_name = "";
    }

if (is_uploaded_file($_FILES['img1']['tmp_name'])) {
    $new_image_name1 = 'img1_'.uniqid().".".pathinfo(basename($_FILES['img1']['name']), PATHINFO_EXTENSION);
    $image_upload_path1 = "./img/".$new_image_name1;
    move_uploaded_file($_FILES['img1']['tmp_name'],$image_upload_path1);
    } else {
    $new_image_name1 = "";
    }

if (is_uploaded_file($_FILES['img2']['tmp_name'])) {
        $new_image_name2 = 'img2_'.uniqid().".".pathinfo(basename($_FILES['img2']['name']), PATHINFO_EXTENSION);
        $image_upload_path2 = "./img/".$new_image_name2;
        move_uploaded_file($_FILES['img2']['tmp_name'],$image_upload_path2);
        } else {
        $new_image_name2 = "";
        }
    
if (is_uploaded_file($_FILES['img3']['tmp_name'])) {
        $new_image_name3 = 'img3_'.uniqid().".".pathinfo(basename($_FILES['img3']['name']), PATHINFO_EXTENSION);
        $image_upload_path3 = "./img/".$new_image_name3;
        move_uploaded_file($_FILES['img3']['tmp_name'],$image_upload_path3);
        } else {
        $new_image_name3 = "";
        }

//คำสั่งเพิ่มข้อมูลในตารง 
$sql="INSERT INTO characters(ch_name,Birthday,Ability,Gender,Race,BloodType,Affiliation,Occupation,Description,Personality,Appearance,profile_img,img1,img2,img3) 
VALUES('$chname','$Birthday','$Ability','$Gender','$race','$BloodType','$affiliation','$occupation','$Description','$Personality','$Appearance','$new_image_name','$new_image_name1','$new_image_name2','$new_image_name3')";
$result=mysqli_query($conn,$sql);
if($result){
    echo "<script> alert('บันทึกข้อมูลเรียบร้อย'); </script>";
    echo "<script> window.location='edit.php'; </script>";
}else{
    echo "<script> alert('ไม่สามารถบันทึกข้อมูลได้'); </script>";
}
?>