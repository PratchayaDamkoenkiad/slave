<?php 
include "connectdb.php";
$characters = $_GET['id'];
$sql1 = "SELECT * FROM characters WHERE ch_id='$characters' ";
$result= mysqli_query($conn,$sql1);
$rs=mysqli_fetch_array($result);
$G =$rs['Gender'];
$R =$rs['Race'];
$B =$rs['BloodType'];
$A =$rs['Affiliation'];
$O =$rs['Occupation'];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/nav.css" />
    <script src="https://cdn.tailwindcss.com"></script>
        <!-- bootstrap.css -->
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap.js -->
    <script src="bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<header>
        <a href="index.php" class="logo">Mato Seihei no Slave</a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="character.php">Character</a></li>
            <li><a href="edit.php">Edit</a></li>
        </ul>
    </header>
    <script type="text/javascript">
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>
 

 
<div class="container mt-32">
    <div class="row">
        <div class="col-sm-16">
        <div class="alert alert-info text-center h2 mb-4 mt-4" role="alert">
  เพิ่มตัวละคร
</div>

<form method="post" action="up.php" enctype="multipart/form-data">
<label>รหัส</label>
<input type="text" name="ch_id" class="form-control" readonly value=<?=$rs['ch_id']?>>
<label>ชื่อละคร : </label>
<input type="text" name="Charactersname" class="form-control" value=<?=$rs['ch_name']?> >
<label>วันเกิด : </label>
<input type="text" name="Birthday" class="form-control" value=<?=$rs['Birthday']?> >
<label>ความสามารถ : </label>
<input type="text" name="Ability" class="form-control" value=<?=$rs['Ability']?> >

<label>เพศ</label>
    <select class="form-select" name="Gender">
    <?php
                                    include 'connectdb.php';
                                    $sql =  'select * from gender '
                                            . 'order by Gender_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['Gender_id'] . '">';
                                        echo $row['Gender_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
    </select>

    <label>เผ่าพันธ์</label>
    <select class="form-select" name="race">
    <?php
                                    include 'connectdb.php';
                                    $sql =  'select * from race '
                                            . 'order by Race_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['Race_id'] . '">';
                                        echo $row['Race_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
    </select>

    <label>กรุ๊ปเลือด</label>
    <select class="form-select" name="BloodType">
    <?php
                                    include 'connectdb.php';
                                    $sql =  'select * from bloodtype '
                                            . 'order by BloodType_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['BloodType_id'] . '">';
                                        echo $row['BloodType_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
    </select>

    <label>สังกัด</label>
    <select class="form-select" name="affiliation">
    <?php
                                    include 'connectdb.php';
                                    $sql =  'select * from affiliation '
                                            . 'order by Affiliation_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['Affiliation_id'] . '">';
                                        echo $row['Affiliation_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
    </select>

    
    <label>อาชีพ</label>
    <select class="form-select" name="occupation">
    <?php
                                    include 'connectdb.php';
                                    $sql =  'select * from occupation '
                                            . 'order by Occupation_id';
                                    $result = mysqli_query($conn,$sql);
                                    while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                                        echo '<option value=';
                                        echo '"' . $row['Occupation_id'] . '">';
                                        echo $row['Occupation_name'];
                                        echo '</option>';
                                    }
                                    mysqli_free_result($result);
                                    mysqli_close($conn);
                                ?>
    </select>

<label for="exampleFormControlTextarea1" class="form-label">คำอธิบาย : </label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Description" value=<?=$rs['Description']?>></textarea>

<label for="exampleFormControlTextarea1" class="form-label">บุคลิกภาพ : </label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Personality" value=<?=$rs['Personality']?>></textarea>

<label for="exampleFormControlTextarea1" class="form-label">รูปร่าง : </label>
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="Appearance" value=<?=$rs['Appearance']?>></textarea>

<div class="mb-3">
  <label for="formFile" class="form-label">Profile</label>
  <img src="./characterimg/<?=$rs['profile_img']?>" width="120"><br>
  <input class="form-control" type="file" id="formFile" name="profileimg">
  <input type="text" name="txtimg" class="form-control" readonly value=<?=$rs['profile_img']?>> <br>
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Img1</label>
  <img src="./img/<?=$rs['img1']?>" width="120"><br>
  <input class="form-control" type="file" id="formFile" name="img1">
  <input type="text" name="txtimg1" class="form-control" readonly value=<?=$rs['img1']?>> <br>
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Img2</label>
  <img src="./img/<?=$rs['img2']?>" width="120"><br>
  <input class="form-control" type="file" id="formFile" name="img2">
  <input type="text" name="txtimg2" class="form-control" readonly value=<?=$rs['img2']?>> <br>
</div>

<div class="mb-3">
  <label for="formFile" class="form-label">Img3</label>
  <img src="./img/<?=$rs['img3']?>" width="120"><br>
  <input class="form-control" type="file" id="formFile" name="img3">
  <input type="text" name="txtimg3" class="form-control" readonly value=<?=$rs['img3']?>> <br>
</div>

<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 border border-blue-700 rounded" type="submit">
    แก้ไข
</button>


    <a href="edit.php" class="bg-red-500 hover:bg-red-500 text-white font-bold py-2 px-4 border border-red-500 rounded">
    ยกเลิก
    </a>


</form>
</div>
</div>
</div>


</body>
</html>