<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Character</title>
    <link rel="stylesheet" href="css/nav.css" />
    <script src="https://cdn.tailwindcss.com"></script>
    
</head>
<body>
<?php include 'header.php'; ?>

<section class="text-gray-600 body-font">
  <div class="container px-5 py-24 mx-auto">
    <div class="flex flex-col text-center w-full mb-20">
      <h1 class="text-2xl font-medium title-font mb-4 text-rose-700">Mato Seihei no Slave</h1>
      <p class="lg:w-2/3 mx-auto leading-relaxed text-base text-gray-100">
      Mato Seihei no Slave (魔都精兵のスレイブ) หรือSlave of the Hell Soldiersเป็นการ์ตูนญี่ปุ่นที่เขียนโดยTakahiro 
      และวาดภาพประกอบโดยYouhei Takemura มังงะเรื่องนี้ออกทุก 2 สัปดาห์ทางเว็บเซอร์วิส Shounen Jump+ ของ Shueisha
      </p>
    </div>
    <div class="flex flex-wrap -m-4">
      
    <?php
                                include 'connectdb.php';
                                $sql="SELECT * FROM characters,occupation,affiliation WHERE characters.Occupation = occupation.Occupation_id
                                and characters.Affiliation = affiliation.Affiliation_id";
                                $result = mysqli_query($conn,$sql);
                                while (($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) != NULL) {
                            ?>
      <div class="p-4 lg:w-1/4 md:w-1/2">
        <div class="h-full flex flex-col items-center text-center">

          <img alt="team" class="flex-shrink-0 rounded-lg w-full h-56 object-cover object-center mb-4" src="characterimg/<?php echo $row["profile_img"];?>">
          <div class="w-full">
            <h2 class="title-font font-medium text-lg text-gray-100"><?php echo $row["ch_name"];?></h2>
            <h3 class="text-gray-500 mb-3"><?php echo $row["Affiliation_name"];?></h3>
            <p class="mb-4"><?php echo $row["Occupation_name"];?></p>
            <button class="bg-transparent hover:bg-red-600 text-red-900 font-semibold hover:text-white py-2 px-4 border border-red-900 hover:border-transparent rounded">
            <a href="charactershow.php?id=<?=$row['ch_id']?>">Read On</a>
</button>
           
          </div>
        </div>
      </div>
      <?php
                                }
                                mysqli_free_result($result);
                                mysqli_close($conn);
                            ?>
    
</section>



<?php include 'footer.php'; ?>
</body>
</html>