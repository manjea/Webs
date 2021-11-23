<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Sessioner</title>
        <link href="css/style.css" rel="stylesheet" type="text/css" />
    </head>
    
    <body>
        <div id="wrapper">
            <header>
                <?php include('inc/header.php'); ?>
            </header>

            <section id="leftColumn">
                <nav>
                    <?php 
                        include('inc/nav.php'); 
                    ?>
                </nav>
                <aside>
                    <?php include('inc/aside.php'); ?>
                </aside>
            </section>

            <?php
                $p = 'start';
                if(isset($_GET['page'])){
                    $p = $_GET['page']; 
                }
                switch ($p) {
                    case 'start':
                        include('pages/start.php');
                        break;

                    case 'kontakt':
                        include('pages/contact.php');
                        break;

                    case 'blog':
                        include('pages/blog.php');
                        break;

                    case 'login':
                        include('pages/login.php');
                        break;
                    
                    case 'logout':
                        include('pages/logout.php');
                        break;
                    
                    case 'register':
                        include('pages/register.php');
                        break;

                    default:
                        # code...
                        break;
                }
            
            ?>

            <footer>
                <?php include('inc/footer.php'); ?>
            </footer>
        </div>
    </body>
</html>