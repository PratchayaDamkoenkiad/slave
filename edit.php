<?php
include "connectdb.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
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
 <div class="mt-32" style="text-align:start">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        <a href="add.php" >เพิ่มตัวละคร</a>
        </button>
        </div>
<div class="flex flex-col ">
  <div class="overflow-x-auto  ">
    <div class="inline-block min-w-full py-2 ">
      <div class="overflow-hidden">
        <table class="min-w-full text-left text-sm font-light">
          <thead class="bg-white border-b font-medium dark:border-neutral-500 text-center">
            <tr>
              <th scope="col" class="px-6 py-4">รหัสตัวละคร</th>
              <th scope="col" class="px-6 py-4">ชื่อละคร</th>
              <th scope="col" class="px-6 py-4">เพศ</th>
              <th scope="col" class="px-6 py-4">สังกัด</th>
              <th scope="col" class="px-6 py-4">อาชีพ</th>
              <th scope="col" class="px-6 py-4">โปรไฟล์</th>
              <th scope="col" class="px-6 py-4">แก้ไข</th>
            </tr>
          </thead>
          <tbody>

          <?php
                $sql="SELECT * FROM occupation,characters,gender,affiliation WHERE characters.Affiliation = affiliation.Affiliation_id and
                characters.Gender = gender.Gender_id
                and characters.Occupation = occupation.Occupation_id";
                $hand=mysqli_query($conn,$sql);
                while($row=mysqli_fetch_array($hand)){

       ?>         
       
            <tr
              class="bg-white border-b transition duration-300 ease-in-out hover:bg-red-900 dark:border-neutral-500 dark:hover:bg-neutral-600 text-center">
              <td class="whitespace-nowrap px-6 py-4 font-medium"><?=$row['ch_id']?></td>
              <td class="whitespace-nowrap px-6 py-4"><?=$row['ch_name']?></td>
              <td class="whitespace-nowrap px-6 py-4"><?=$row['Gender_name']?></td>
              <td class="whitespace-nowrap px-6 py-4"><?=$row['Occupation_name']?></td>
              <td class="whitespace-nowrap px-6 py-4"><?=$row['Affiliation_name']?></td>
              <td class="whitespace-nowrap px-6 py-4"><img src="./characterimg/<?=$row['profile_img']?>" style="width: 120px; height: 100px; display: block; margin: auto;" ></td>
              <td class="whitespace-nowrap px-6 py-4">
              <button type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:focus:ring-yellow-900">
              <a href="editcharacter.php?id=<?=$row['ch_id']?>">แก้ไข</a>
            </button>

            <button type="button" class="focus:outline-none text-white bg-red-700 hover:bg-red-800 focus:ring-4 focus:ring-red-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
            <a href="JavaScript:if(confirm('ยืนยันการลบ')==true){window.location='characterdelete.php?id=<?=$row['ch_id']?>'}">ลบ</a>
            </button>
            </td>
            </tr>
            <?php 
                     }
                     mysqli_close($conn);                                        
                 ?>

          </tbody>
        </table><br>
        <div style="text-align:right">
        <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
        <a href="add.php" >เพิ่มตัวละคร</a>
        </button>
        </div>
      </div>
    </div>
  </div>
</div>


<?php include 'footer.php'; ?>

</body>
</html>