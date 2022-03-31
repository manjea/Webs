<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    form > *{
        margin:5px;
    }
</style>
<body>
    <?php
        session_start();

        if(isset($_GET['update'])){
            echo "Uppdaterat och klart!";
        }
        
        if(isset($_GET['delete'])){
            echo "Borttaget och klart!";
        }

        if(isset($_GET['add'])){
            echo "Tillagt och klart!";
        }
        
        if(isset($_GET['cancel'])){
            echo "Avbrytet och klart!";
        }

        if(isset($_SESSION['loggedIn'])){
            echo '<form action="searchUsers.php" method="post">
            <input type="text" name="value" id="search">
            <input type="submit" value="search" name="search">
        </form>';
        }
    ?>
    
    <br/><br/>
    <form style="border:1px solid black; width:min-content;" action="confirmAddUser.php" method="post">
        Username: <input type="text" name="uname" required><br/>
        Email: <input type="email" name="email" required><br/>
        Password: <input type="password" name="password" id="psw"><br/><br/>
        <input type="submit" value="Lägg till">
    </form>
    <br/><br/>
    <?php
        if(!isset($_SESSION['loggedIn'])){
            echo '<form style="border:1px solid black; width:min-content;" action="login.php" method="post">';
            echo 'uname: <input type="text" name="uname" value="'. (isset($_GET['n']) ? $_GET['n'] : 'hejsanhoppsan') .'"><br/>';
            echo 'pass: <input type="password" name="pass"><br/><br/>';
            echo '<input type="submit" value="Logga in" name="login"></form>';
        }else{
            echo '<a href="logout.php">Logga ut</a>';
        }

    ?>
</body>
</html>