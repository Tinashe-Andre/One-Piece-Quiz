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
                <label>Who is the Vice Captin of the Straw Hat Pirates?</label><br>
                <input type="radio" name="vice-captin"> Black Leg Sanji <br>
                <input type="radio" name="vice-captin"> Dr. Chopper <br>
                <input type="radio" name="vice-captin"> Pirate Hunter Zoro <br>
                <input type="radio" name="vice-captin"> Cat Burgler Nami <br>
            </div>
            <div class="question">
                <label>Who is the Vice Captin of the Straw Hat Pirates?</label><br>
                <input type="radio" name="vice-captin"> Black Leg Sanji <br>
                <input type="radio" name="vice-captin"> Dr. Chopper <br>
                <input type="radio" name="vice-captin"> Pirate Hunter Zoro <br>
                <input type="radio" name="vice-captin"> Cat Burgler Nami <br>
            </div>
            <div class="question">
                <label>Who is the Vice Captin of the Straw Hat Pirates?</label><br>
                <input type="radio" name="vice-captin"> Black Leg Sanji <br>
                <input type="radio" name="vice-captin"> Dr. Chopper <br>
                <input type="radio" name="vice-captin"> Pirate Hunter Zoro <br>
                <input type="radio" name="vice-captin"> Cat Burgler Nami <br>
            </div>
        </form>
    </main>
</body>
</html>
<?php
    include("footer.html");
?>