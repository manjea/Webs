<?php
    $password_encrypt = password_hash($_POST['password'], PASSWORD_DEFAULT);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table{
        border: 1px solid black;
    }
    tr{
        border: 1px solid black;
    }
    th{
        border: 1px solid black;
        padding: 5px;
    }
    td{

        border: 1px solid black;
        padding: 5px;
    }
    td>*{
        display:flex;
        justify-content: center;
    }
</style>
<body>
    <h1>Är du säker på att du vill lägga till följande?</h1>
    <table>
        <th>Username</th>
        <th>Email</th>
        <tr>
            <td> <?php echo $_POST['uname']; ?></td>
            <td> <?php echo $_POST['email']; ?></td>
        </tr>
    </table>
    <br/>
    <form action="addUser.php" method="post">
        <input type="hidden" name="uname" value="<?php echo $_POST['uname']; ?>">
        <input type="hidden" name="email" value="<?php echo $_POST['email']; ?>">
        <input type="hidden" name="password" value="<?php echo $password_encrypt; ?>">
        <input type="submit" value="Add" name="add">
        <input type="submit" value="Avbryt" name="cancel">
    </form>
</body>
</html>