<?php
    include("header.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Piece Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <main>
        <section id="quiz">
            <h1>Test Your One Piece Knowledge!</h1>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="question">
                    <label>Who is the Vice Captin of the Straw Hat Pirates?</label><br>
                    <input type="radio" name="vice-captin"> Black Leg Sanji <br>
                    <input type="radio" name="vice-captin"> Dr. Chopper <br>
                    <input type="radio" name="vice-captin"> Pirate Hunter Zoro <br>
                    <input type="radio" name="vice-captin"> Cat Burgler Nami <br>
                </div>
                <div class="question">
                    <label>Who is the Navigator of the Straw Hat Pirates?</label><br>
                    <input type="radio" name="navigator"> Black Leg Sanji <br>
                    <input type="radio" name="navigator"> Dr. Chopper <br>
                    <input type="radio" name="navigator"> Pirate Hunter Zoro <br>
                    <input type="radio" name="navigator"> Cat Burgler Nami <br>
                </div>
                <div class="question">
                    <label>Who has the highest bounty in the Straw Hat Pirates?</label><br>
                    <input type="radio" name="bounty"> Pirate Hunter Zoro <br>
                    <input type="radio" name="bounty"> Monkey D. Luffy <br>
                    <input type="radio" name="bounty">  First Son of the Sea Jinbe<br>
                    <input type="radio" name="bounty"> Cyborg Franky <br>
                </div>
                <div class="question">
                    <label>Who is the cutest Straw Hat Pirate?</label><br>
                    <input type="radio" name="cutest"> Robin <br>
                    <input type="radio" name="cutest"> Nami <br>
                    <input type="radio" name="cutest"> Ussop <br>
                    <input type="radio" name="cutest"> CChopper <br>
                </div>
                <input class="button" type="submit" name="check" value="Check Answers">
            </form>
            <?php
                $answer = null;

                if(isset($_POST["check"])){
                    
                }
            ?>
        </section>
    </main>
</body>
</html>
<?php
    include("footer.html");
?>