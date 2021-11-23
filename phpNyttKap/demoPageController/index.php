<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Page controller</title>
    </head>
    <body>
        <?php include('includes/header.php'); ?>
        
        <nav>
            <?php include('includes/menu.php'); ?>
        </nav>
        
        <section>
            <?php
                $p = 'start'; 

                if(isset($_GET['page'])){
                    $p = $_GET['page'];
                }

                // include("pages/${$p}.php")

                switch ($p) {
                    case 'om':
                        include("pages/om.php");
                        break;

                    case 'kontakt':
                        include("pages/contact.php");
                        break;

                    default:
                        include("pages/start.php");
                        break;
                }
            ?>
        </section> 
    </body>
</html>