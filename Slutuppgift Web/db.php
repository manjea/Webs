<?php
    function connectToDB()
    {
        define ("DB_HOST", "localhost");
        define ("DB_NAME", "javlaskitprogram"); // byt till ditt databasnamn
        define ("DB_USER", "Web_inl_admin"); // byt till ditt användarnamn
        define ("DB_PASSWORD", "Web_inl_admin"); // byt till ditt lösenord

        $dbh = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASSWORD
        );

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        return $dbh;
    }

    function loginCustomer($dbh){
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password']; //passwords behöver inte sanitizas eftersom de hasha ändå;

        $sql = "SELECT * FROM customer WHERE mail LIKE :em";



        $stmt = $dbh->prepare($sql);

        $stmt->bindValue('em', $email, PDO::PARAM_STR);

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 1){
            if(password_verify($password, $row['password'])){
                $_SESSION['loggedIn'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['email'];
                return true;
            }
        }
        return false;
    }

    function registerCustomer($dbh){
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);//passwords behöver inte sanitizas eftersom de hasha ändå;

        if(!($_POST['password'] > 5)){
            return false;
        }

        //$sql = "INSERT INTO customer (firstname, lastname, mail, password) VALUES (:fn, :ln, :em, :pw)";

        $sql = 'INSERT INTO `customer` (`firstname`, `lastname`, `mail`, `password`) VALUES (:fn, :ln, :em, :pw)';

        $stmt = $dbh->prepare($sql);


        $stmt->bindValue('fn', $firstname, PDO::PARAM_STR);

        $stmt->bindValue('ln', $lastname, PDO::PARAM_STR);

        $stmt->bindValue('em', $email, PDO::PARAM_STR);

        $stmt->bindValue('pw', $password, PDO::PARAM_STR);

        
        $stmtExec = $stmt->execute();

        if($stmtExec){
            return true;
        }
        return false;
    }

    function fetchAllArticles($dbh){
        $sql = "SELECT COUNT(article_id) FROM article";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    function fetchArticleById($id, $dbh, $type=null){
        if($type){

            $sql = "SELECT * FROM article WHERE article.article_id = :id AND article.article_type = :type";

            $stmt = $dbh->prepare($sql);

            $stmt->bindValue('id', $id, PDO::PARAM_STR);

            $stmt->bindValue('type', $type, PDO::PARAM_STR);

            
        }else{
            $sql = "SELECT * FROM article WHERE article.article_id LIKE :id";

            $stmt = $dbh->prepare($sql);

            $stmt->bindValue('id', $id, PDO::PARAM_STR);
        }

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $stmt->closeCursor();

        if($row){
            return $row;
        }else{
            return false;
        }
            
    }

    function mailTo(){
        $name = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $messagetext = filter_input(INPUT_POST, 'meddelandetext', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $subject = $name;
        $to_email_address = "manjea@edu.umea.se"; //här kan du byta om du vill skicka till dig själv
        $message = $messagetext . '\n' . $email;

        mail($to_email_address,$subject,$message);

    }

    function getAllUsers($dbh){
        $sql = "SELECT user_id, username FROM users";

        $stmt = $dbh->prepare($sql);
        
        $stmt->execute();   // false eller true     true -> $stmt får resultat

        return $stmt;
    }

    function makePurchase($dbh){
        $summa = 0;
        $cartArray = explode(',',$_COOKIE['cart']);
        //echo print_r($cartArray);

        $sql = "INSERT INTO `order` (`user_id`, `summa`) VALUES (:uid, :sum)";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue('uid', $_SESSION['user_id'], PDO::PARAM_STR);
        
        $stmt->bindValue('sum', '0', PDO::PARAM_STR);

        $stmt->execute();

        $sql = "INSERT INTO `order` (`user_id`, `summa`) VALUES ({$_SESSION['user_id']}, 0)";

        //get order id somewhere her
        //$dbh->exec($sql);
        $last_id = $dbh->lastInsertId();

        $stmt->closeCursor();

        foreach ($cartArray as $key => $value) {
            $pris = makeReciept($dbh, $value, $last_id);

            $summa += $pris;
        }

        $sql = "UPDATE `order` SET `summa` = $summa WHERE `order_id` LIKE $last_id";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        unset($_COOKIE['cart']); 
        setcookie('cart', null, -1, '/');

        echo "your total is: " . $summa . "<br /><br /><br />";

        
    }

    function makeReciept($dbh, $value, $order_id){
        $row = fetchArticleById($value, $dbh);

        $sql = 'INSERT INTO `reciept` (`order_id`, `article_id`, `amount`, `reciept_summa`) VALUES (:oid, :aid, :am, :sum)';

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue('oid', $order_id, PDO::PARAM_STR);

        $stmt->bindValue('aid', $value, PDO::PARAM_STR);

        $stmt->bindValue('am', '1', PDO::PARAM_STR);

        $stmt->bindValue('sum', $row['price'], PDO::PARAM_STR);

        $stmt->execute();

        $stmt->closeCursor();

        return $row['price'];
    }

    function getRecieptsToPrint($dbh, $order_id){
        $sql = "SELECT 
                * 
                FROM `reciept` 
                INNER JOIN 
                `order` 
                ON `order`.order_id LIKE {$order_id}
                AND `reciept`.order_id LIKE `order`.order_id";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        return $stmt;
    }

    function getAllOrders($dbh, $user_id){
        $sql = "SELECT 
                * 
                FROM `order` 
                INNER JOIN 
                customer 
                ON customer.user_id LIKE {$user_id} 
                AND customer.user_id LIKE `order`.user_id;"; //lite roligt att passa in user_iud som ett argument hihi

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        return $stmt;
    }
?>