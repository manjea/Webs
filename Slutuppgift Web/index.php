<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>BRÖTHERS</title>
        <link href="./inc/styles/style.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <script src="./scripts/CartScripts.js"></script>
    </head>
    
    <body>
        <div id="wrapper">
            <header>
                <?php include('./inc/header.php'); ?>
            </header>

            <section id="nav-section">
                <nav>
                    <?php 
                        include('./inc/nav.php'); 
                    ?>
                </nav>
                    
                <hr />
            </section>
            <?php
            if(isset($_SESSION['admin'])){
                echo '<p style="text-align:center;">
                <a href="index.php?page=viewUsers">View Users</a>
            </p>';
            }
                
            ?>
            <?php
                $p = 'start';
                if(isset($_GET['page'])){
                    $p = $_GET['page']; 
                }
                switch ($p) {
                    case 'start':
                        include('./pages/start.php');
                        break;

                    case 'about':
                        include('./pages/about.php');
                        break;

                    case 'browse':
                        include('./pages/browse.php');
                        break;

                    case 'viewUsers':
                        include('./pages/viewUsers.php');
                        break;

                    case 'editUser':
                        include('./pages/editUser.php');
                        break;

                    case 'editedUser':
                        include('./pages/editedUser.php');
                        break;

                    case 'userEditUser':
                        include('./pages/userEditUser.php');
                        break;

                    case 'contact':
                        include('./pages/contact.php');
                        break;

                    case 'profile':
                        include('./pages/profile.php');
                        break;

                    case 'checkout':
                        include('./pages/checkout.php');
                        break;

                    case 'recipies':
                        include('./pages/recipies.php');
                        break;

                    case 'findshop':
                        include('./pages/findshop.php');
                        break;

                    case 'login':
                        include('./pages/login.php');
                        break;
                    
                    case 'logout':
                        include('./pages/logout.php');
                        break;
                    
                    case 'register':
                        include('./pages/register.php');
                        break;

                    /*default:
                    	include('./pages/start.php');
                        break;*/
                }
            
            ?>

            <footer>
                <?php include('./inc/footer.php'); ?>
            </footer>
        </div>
    </body>
</html>