<?php
    function connectToDB()
    {
        define ("DB_HOST", "localhost");
        define ("DB_NAME", "loginExam"); // byt till ditt databasnamn
        define ("DB_USER", "webInl"); // byt till ditt användarnamn
        define ("DB_PASSWORD", "webInl"); // byt till ditt lösenord

        $dbh = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASSWORD
        );

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        return $dbh;
    }

    function loginUser($dbh){
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = $_POST['password']; //passwords behöver inte sanitizas eftersom de hasha ändå;
        $sql = "SELECT * FROM users WHERE username LIKE :u";



        $stmt = $dbh->prepare($sql);

        $stmt->bindValue('u', $username, PDO::PARAM_STR);

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 1){
            if(password_verify($password, $row['password'])){
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['username'] = $row['username'];
                header('Location: ../index.php');
            }
        }
    }

    function getPosts($dbh){
        $user_id = $_SESSION['user_id'];
        
        $sql = "SELECT * 
                FROM posts 
                INNER JOIN users 
                ON posts.from_user_id = users.user_id 
                AND posts.to_user_id = :my_uid";

        $stmt = $dbh->prepare($sql); 

        $stmt->bindValue('my_uid', $user_id, PDO::PARAM_INT);

        return $stmt;
    }

    function addPost($dbh){

        $text = filter_input(INPUT_POST, 'text', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $val = $_POST['val'];
        $user_id = $_SESSION['user_id'];
        $sql = "INSERT INTO posts (to_user_id, from_user_id, text) VALUES (:t_uid, :f_uid, :t)";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue('t_uid', $val, PDO::PARAM_INT);

        $stmt->bindValue('f_uid', $user_id, PDO::PARAM_INT);

        $stmt->bindValue('t', $text, PDO::PARAM_STR);

        $stmt->execute();
        
        header('Location: posts.php');
    }

    function addUser($dbh){
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);//passwords behöver inte sanitizas eftersom de hasha ändå;

        $sql = "INSERT INTO users (firstname, lastname, username, password) VALUES (:fn, :ln, :un, :pw)";

        $stmt = $dbh->prepare($sql);


        $stmt->bindValue('fn', $firstname, PDO::PARAM_STR);

        $stmt->bindValue('ln', $lastname, PDO::PARAM_STR);

        $stmt->bindValue('un', $username, PDO::PARAM_STR);

        $stmt->bindValue('pw', $firstname, PDO::PARAM_STR);


        if($stmt->execute()){
            return true;
        }
        return false;
    }

    function getAllUsers($dbh){
        $sql = "SELECT user_id, username FROM users";

        $stmt = $dbh->prepare($sql);
        
        $stmt->execute();   // false eller true     true -> $stmt får resultat

        return $stmt;
    }
?>