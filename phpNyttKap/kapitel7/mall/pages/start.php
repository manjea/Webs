<section id="main">
   <h1>Välkommen till Webbserverprogrammering 1</h1>
   <p>Startsida</p>
   <?php
      if(isset($_GET['msg'])){
          echo $_GET['msg'];
      }
      
      ?>
</section>