<section id="main">
   <h1>Startsida</h1>
   <p>hejsan</p>
   <span>
        <?php
            if(isset($_GET['msg'])){
                echo $_GET['msg'];
            }
        ?>
   </span>
</section>