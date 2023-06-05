<header>
        <a href="index.php" class="logo">Mato Seihei no Slave</a>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="character.php">Character</a></li>
            <li><a href="edit.php">Edit</a></li>
        </ul>
    </header>
    <section class="banner"></section>
    <script type="text/javascript">
        window.addEventListener("scroll", function(){
            var header = document.querySelector("header");
            header.classList.toggle("sticky", window.scrollY > 0);
        })
    </script>