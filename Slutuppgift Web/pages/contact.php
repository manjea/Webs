
<section id="main">
    <!-- Lägg till formulär -->
    <form action="#" method="post">
        <fieldset>
            <legend>Contact</legend>

            <p>
                <label for="namn">Full Name</label><br />
                <input type="text" name="namn" id="namn" placeholder="namn" required><br>
            </p>

            <p>
                <label for="email">Email</label><br />
                <input type="email" name="email" id="email" placeholder="namn@example.uk" required><br>
            </p>
            
            <p>
                <label for="meddelandetext">Message</label><br />
                <textarea name="meddelandetext" id="meddelandetext" cols="30" rows="10" placeholder="hejsan" required></textarea>
            </p>
            
            <p>
                <label for="reciept">Reciept Image</label><br />
                <input type="file" name="reciept" id="reciept" accept="image/*"><br />
                <span style="font-size:12px;">*optional</span>
            </p>

            <input type="submit" value="Send"></input>

            <span id="login-btn">
                Don't have an account? 
                <a href="index.php?page=register">Sign up</a>
            </span>
        </fieldset>
    </form>
</section>
