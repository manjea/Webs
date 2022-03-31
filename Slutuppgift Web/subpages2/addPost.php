<article id="articleRight">
    <h3>Skriv inlägg</h3>
    <?php 
        if(isset($_POST['submit'])){
            addPost($dbh);
        }
    ?>
    <form action="#" method="post">
        <p>
            <textarea placeholder="Skriv något här..." name="text" required cols="35" rows="2"></textarea>
            <input type="submit" name="submit" value="Kommentera" />
        </p>
        <!-- Kod för att skriva ut en <select>-lista med användare -->

        <select name="val"> 
            <?php 
                $users = getAllUsers($dbh); 
                
                while($row = $users->fetch(PDO::FETCH_ASSOC))
                {
                    if($row['user_id'] != $_SESSION['user_id']){
                        echo "<option value='" . $row["user_id"] . "'>" . $row['username'] . "</option>";
                    }

                }

            ?> 
        </select>
    </form>
    
</article>