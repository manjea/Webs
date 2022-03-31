<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Sessioner</title>
        <link href="css/style.css" rel="stylesheet" />
    </head>
    <body>
        <?php include('inc/nav.php') ?>
        
        <section>
            <?php
                $start = 'home';
                if(isset($_GET['page'])){
                    $start = $_GET['page'];
                }
                //kollar vilken sida man ska till och laddar in den
                switch ($start) {
                    case 'home':
                        include('subpages/start.php');
                        break;
                    
                    case 'contact':
                        include('subpages/contact.php');
                        break;

                    case 'login':
                        include('subpages/login.php');
                        break;

                    case 'logout':
                        include('subpages/logout.php');
                        break;

                    case 'products':
                        include('subpages/products.php');
                        break;

                    case 'shop':
                        include('subpages/shop.php');
                        break;
                    case 'register':
                        include('subpages/register.php');
                        break;
                }
            ?>
        </section>

        <?php include('inc/footer.php') ?>
        
    </body>
</html>