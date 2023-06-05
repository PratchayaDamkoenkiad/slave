<?php 
include "connectdb.php"
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
 

<div class="container px-5 py-24 mx-auto mt-16 text-gray-100">
<?php 
  $ids=$_GET['id'];
  $sql="SELECT * FROM bloodtype,characters,affiliation,gender,occupation,race WHERE characters.BloodType = bloodtype.BloodType_id and
  characters.Affiliation = affiliation.Affiliation_id
  and characters.Gender = gender.Gender_id
  and characters.Occupation = occupation.Occupation_id
  and characters.Race = race.Race_id
  and characters.ch_id='$ids' ";

                
$result = mysqli_query($conn,$sql);
$row=mysqli_fetch_array($result);
    ?>

    <div class="lg:w-4/5 mx-auto flex flex-wrap">
      <div class="lg:w-1/2 w-full lg:pr-10 lg:py-6 mb-6 lg:mb-0">
        <h2 class="text-sm title-font text-gray-100 tracking-widest"><?=$row['Affiliation_name']?></h2>
        <h1 class="text-gray-200 text-3xl title-font font-medium "><?=$row['ch_name']?></h1>
        <h2 class="text-xl title-font text-gray-500 tracking-widest mb-4"><?=$row['Occupation_name']?></h2>
        <p class="leading-relaxed mb-4">
        <?=$row['Description']?>
        </p>

        <div class="flex border-t border-gray-200 py-2">
          <span class="text-gray-100">เพศ</span>
          <span class="ml-auto text-gray-100"><?=$row['Gender_name']?></span>
        </div>

        <div class="flex border-t border-gray-200 py-2">
          <span class="text-gray-100">เผ่าพันธ์ุ</span>
          <span class="ml-auto text-gray-100"><?=$row['Race_name']?></span>
        </div>

        <div class="flex border-t border-gray-200 py-2">
          <span class="text-gray-100">วันเกิด</span>
          <span class="ml-auto text-gray-100"><?=$row['Birthday']?></span>
        </div>

        <div class="flex border-t border-gray-200 py-2">
          <span class="text-gray-100">ความสามารถ</span>
          <span class="ml-auto text-gray-100"><?=$row['Ability']?></span>
        </div>

        <div class="flex border-t border-gray-200 py-2">
          <span class="text-gray-100">กรุ๊ปเลือด</span>
          <span class="ml-auto text-gray-100"><?=$row['BloodType_name']?></span>
        </div>

       
        <div class="flex border-t border-b mb-6 border-gray-200 py-2">
          <span class="text-gray-100">สังกัด</span>
          <span class="ml-auto text-gray-100"><?=$row['Affiliation_name']?>         <br>
          <?=$row['Occupation_name']?></span>
        </div>

        <div class="flex mb-4">
          <a class="flex-grow text-rose-700 border-b-2 border-rose-700 py-2 text-lg px-1">บุคลิกภาพ</a>
        </div>
<p class="leading-relaxed mb-4">
<?=$row['Personality']?> 
</p>

<div class="flex mb-4">
          <a class="flex-grow text-rose-700 border-b-2 border-rose-700 py-2 text-lg px-1">รูปร่าง</a>
        </div>
<p class="leading-relaxed mb-4">
<?=$row['Appearance']?> 
</p>


      </div>
      <img alt="ecommerce" class="lg:w-1/2 w-full lg:h-auto h-64 object-cover object-center rounded" src="characterimg/<?php echo $row["profile_img"];?>" >
    </div>
  </div>

  <section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col">
      <div class="h-1 bg-gray-200 rounded overflow-hidden">
        <div class="w-FULL h-full bg-rose-700"></div>
      </div>
      <div class="flex flex-wrap sm:flex-row flex-col py-6 mb-12">
        <h1 class="sm:w-2/5 text-rose-700 font-medium title-font text-2xl mb-2 sm:mb-0">MATO SEIHEI NO SLAVE</h1>
      </div>
    </div>
    <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4">
      <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
          <img alt="content" class="object-cover object-center h-full w-full" src="img/<?php echo $row["img1"];?> ">
        </div>

      </div>
      <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="img/<?php echo $row["img2"];?> ">
        </div>
      </div>
      <div class="p-4 md:w-1/3 sm:mb-0 mb-6">
        <div class="rounded-lg h-64 overflow-hidden">
        <img alt="content" class="object-cover object-center h-full w-full" src="img/<?php echo $row["img3"];?> ">
        </div>
      </div>
    </div>
  </div>
</section>

  <?php 
  mysqli_close($conn);
  ?>

<?php include 'footer.php'; ?>

</body>
</html>