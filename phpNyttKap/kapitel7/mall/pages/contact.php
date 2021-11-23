<!DOCTYPE html>
<html lang="sv">
    <head>
        <meta charset="utf-8" />
        <title>Sessioner</title>
        <link href="../css/style.css" rel="stylesheet" type="text/css" />
    </head>

    <body>
        <section id="main">
            <h1>Kontakt</h1>

            <!-- Lägg till formulär -->
            <form action="#" method="post">
                <fieldset>
                    <legend>Contact</legend>

                    <label for="namn">Namn:</label><br>
                    <input type="text" name="namn" id="namn" placeholder="namn" required><br>
                    <label for="email">Mail:</label><br>
                    <input type="email" name="email" id="email" placeholder="namn@example.uk" required><br>
                    <label for="meddelandetext">Meddelande:</label><br>
                    <textarea style="resize: none;" name="meddelandetext" id="meddelandetext" cols="30" rows="10" placeholder="hejsan" required></textarea>
                    <br>
                    <button type="submit">Submit</button>
                </fieldset>
            </form>
        </section>
    </body>
</html>