<?php
    function connectToDB(){
        define ("DB_HOST", "mysql410.loopia.se");
        define ("DB_NAME", "webbkodning_se_db_22"); // byt till ditt databasnamn
        define ("DB_USER", "manjea@w317086"); // byt till ditt användarnamn
        define ("DB_PASSWORD", "Dragonskolan22"); // byt till ditt lösenord

        // define ("DB_HOST", "localhost");
        // define ("DB_NAME", "javlaskitprogram"); // byt till ditt databasnamn
        // define ("DB_USER", "Web_inl_admin"); // byt till ditt användarnamn
        // define ("DB_PASSWORD", "Web_inl_admin"); // byt till ditt lösenord

        $dbh = new PDO(
            "mysql:host=".DB_HOST.";dbname=".DB_NAME.";charset=utf8", DB_USER, DB_PASSWORD
        );

        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        
        return $dbh;
    }

    function loginCustomer($dbh){ //returenerar true om kunden loggades in och false om den inte gjorde det.
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = $_POST['password']; //passwords behöver inte sanitizas eftersom de hasha ändå;

        $sql = "SELECT * FROM customer WHERE mail LIKE :em";



        $stmt = $dbh->prepare($sql);

        $stmt->bindValue('em', $email, PDO::PARAM_STR);

        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        if($stmt->rowCount() == 1){ //om det finns en användare skapas sessioner
            if(password_verify($password, $row['password'])){
                $_SESSION['loggedIn'] = true;
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['firstname'] = $row['firstname'];
                $_SESSION['lastname'] = $row['lastname'];
                $_SESSION['email'] = $row['mail'];

                if("admin@admin.admin" == $_SESSION['email']){ //hehe, om det är admin skapas sessionen admin
                    $_SESSION['admin'] = true;
                }
                return true; //användaren loggades in
            }
        }
        return false; //användaren loggandes inte in
    }

    function registerCustomer($dbh){ //returenerar true om kontot skapades och false om det inte gjorde det.
        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);//passwords behöver inte sanitizas eftersom de hasha ändå;

        if(!($_POST['password'] > 5)){ //om lösen är kortare än 5
            return false; //kontot skapades inte
        }

        $sql = 'INSERT INTO `customer` (`firstname`, `lastname`, `mail`, `password`) VALUES (:fn, :ln, :em, :pw)';

        $stmt = $dbh->prepare($sql);


        $stmt->bindValue('fn', $firstname, PDO::PARAM_STR);

        $stmt->bindValue('ln', $lastname, PDO::PARAM_STR);

        $stmt->bindValue('em', $email, PDO::PARAM_STR);

        $stmt->bindValue('pw', $password, PDO::PARAM_STR);

        
        $stmtExec = $stmt->execute();

        if($stmtExec){
            return true; //kontot skapades
        }
        return false; //kontot skapades inte
    }

    function editCustomer($dbh, $user_id){ //returnerar true om det gick att andra användaren
        $row = getUserById($dbh, $user_id); //hämtar användaren som ska ändras


        //dessa if satser kollar om man skrivit in något i formuläret och ifall man inte gjort det så används det tidigare värdet
        if(strlen($_POST['firstname']) > 1 ){
            $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        }else{
            $firstname = $row['firstname'];
        }
        if(strlen($_POST['lastname']) > 1){
            $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        }else{
            $lastname = $row['lastname'];
        }
        if(strlen($_POST['email']) > 1){
            $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        }else{
            $email = $row['email'];
        }
        if(strlen($_POST['password']) > 5){
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        }else{
            $password = $row['password'];
        }
        
        $sql = "UPDATE customer SET firstname = :fn, lastname = :ln, mail = :em, password = :pw WHERE customer.user_id = {$user_id};"; //parameters måste ha andra namn eftersom dom redan är preparade innan och annars buggar

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':fn', $firstname);

        $stmt->bindValue(':ln', $lastname, PDO::PARAM_STR);

        $stmt->bindValue(':em', $email, PDO::PARAM_STR);

        $stmt->bindValue(':pw', $password, PDO::PARAM_STR);

        return $stmt->execute(); //returnerar true om det funkade
    }

    function getUserById($dbh, $user_id){ //hämtar användarens värden i form av en rad med värden (associativ array)
        $sql = "SELECT * FROM customer WHERE user_id LIKE {$user_id};";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC); //hämtar array

        return $row;
    }

    function fetchNumberOfArticles($dbh){ //hämtar antalet artiklar i databasen
        $sql = "SELECT COUNT(article_id) FROM article";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    function fetchArticleById($id, $dbh, $type=null){ //hämtar artikel via dess id och ifall specifiserat dess typ
        if($type){ //om vi angett en typ (null = false)

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

        $stmt->closeCursor(); //stänger cursorn för att kunna utföra fler operationer via PDO

        if($row){
            return $row;
        }else{
            return false;
        }
            
    }

    function mailTo(){ //mailar
        $name = filter_input(INPUT_POST, 'namn', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $messagetext = filter_input(INPUT_POST, 'meddelandetext', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $subject = $name;
        $to_email_address = "manjea@edu.umea.se"; //här kan du byta om du vill skicka till dig själv
        $message = $messagetext . "\n" . $email;

        mail($to_email_address,$subject,$message); //mailar

    }

    function editSelf($dbh, $user_id){ //kunden redigerar sig själv och får endast ändra lösenord
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);//passwords behöver inte sanitizas eftersom de hasha ändå;

        $sql = "UPDATE customer SET password = :pw WHERE customer.user_id = {$user_id};"; //parameters måste ha andra namn eftersom dom redan är preparade innan och annars buggar
    
        $stmt = $dbh->prepare($sql);

        $stmt->bindValue(':pw', $password);

        return $stmt->execute(); //returnerar true om det funkade
    }

    function getAllUsers($dbh){ //hämtar ett $stmt object som innehåller alla användare och returnerar det
        $sql = "SELECT * FROM customer";

        $stmt = $dbh->prepare($sql);
        
        $stmt->execute();   // false eller true     true -> $stmt får resultat

        return $stmt;
    }

    function makePurchase($dbh){ //skapar en order och reciepts till ordern samt skriver ut köpet
        $summa = 0;
        $cartArray = explode(',',$_COOKIE['cart']);

        //först skapas en order, som vi inte ännu vet hur mycket den kommer kosta.
        $sql = "INSERT INTO `order` (`user_id`, `summa`) VALUES (:uid, :sum)";

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue('uid', $_SESSION['user_id'], PDO::PARAM_STR);
        
        $stmt->bindValue('sum', '0', PDO::PARAM_STR);

        $stmt->execute();

        //sedan hämtas id:t för ordern som just skapats.
        $last_id = $dbh->lastInsertId();

        //vi stänger $stmt objektet för att kunna utföra fler PDO operationer.
        $stmt->closeCursor();

        foreach ($cartArray as $key => $value) { //sedan loopar vi igenom vår cart
            $pris = makeReciept($dbh, $value, $last_id); //vi kör funktionen makeReciept på varje artikel i vår varukorg

            $summa += $pris; //vi lägger till priset på artikeln i en variabel $summa
        }

        //sedan uppdaterar vi ordern för att ha rätt summa på ordern
        $sql = "UPDATE `order` SET `summa` = $summa WHERE `order_id` LIKE $last_id";

        $stmt = $dbh->prepare($sql);

        $stmt->execute();

        //och tillsist tömmer vi varukorgen och skriver ut köpet
        unset($_COOKIE['cart']); 
        setcookie('cart', null, -1, '/');

        echo "your total is: " . $summa . "<br /><br /><br />";
    }

    function makeReciept($dbh, $value, $order_id){//returnerar priset på en enskiljd artikel, och lägger till en reciept med order_id = den inskickade order_id:n.

        //vi börjar med att hämta varan
        $row = fetchArticleById($value, $dbh);

        //vi skapar sedan en reciept
        $sql = 'INSERT INTO `reciept` (`order_id`, `article_id`, `amount`, `reciept_summa`) VALUES (:oid, :aid, :am, :sum)';

        $stmt = $dbh->prepare($sql);

        $stmt->bindValue('oid', $order_id, PDO::PARAM_STR);

        $stmt->bindValue('aid', $value, PDO::PARAM_STR);

        $stmt->bindValue('am', '1', PDO::PARAM_STR);

        $stmt->bindValue('sum', $row['price'], PDO::PARAM_STR);

        $stmt->execute();

        //vi stänger $stmt objektet för att kunna utföra fler PDO operationer.
        $stmt->closeCursor();

        return $row['price'];
    }

    function getRecieptsToPrint($dbh, $order_id){ //returnerar $stmt objektet som innehåller reciepts, för en speciell order_id
        //vi använder oss av JOIN för att hämta recieptsen som har samma order_id som den inskickade order_id:n
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

    function getAllOrders($dbh, $user_id){ //returnerar $stmt objektet som innehåller orders, för en speciell user
        //vi använder oss av JOIN för att hämta de orders som har samma user_id som den inskickade user_id:n

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