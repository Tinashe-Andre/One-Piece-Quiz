<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Piece Quiz</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <?php include("header.html"); ?>
    <main>
        <section id="quiz">
            <h1>Test Your One Piece Knowledge!</h1>
            <form action="<?php htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="question">
                    <label>Who is the Vice Captin of the Straw Hat Pirates?</label><br>
                    <input type="radio" name="vice-captin" value="Sanji"> Black Leg Sanji <br>
                    <input type="radio" name="vice-captin" value="Chopper"> Dr. Chopper <br>
                    <input type="radio" name="vice-captin" value="Zoro"> Pirate Hunter Zoro <br>
                    <input type="radio" name="vice-captin" value="Nami"> Cat Burgler Nami <br>
                </div>
                <div class="question">
                    <label>Who is the Navigator of the Straw Hat Pirates?</label><br>
                    <input type="radio" name="navigator" value="Sanji"> Black Leg Sanji <br>
                    <input type="radio" name="navigator" value="Chopper"> Dr. Chopper <br>
                    <input type="radio" name="navigator" value="Zoro"> Pirate Hunter Zoro <br>
                    <input type="radio" name="navigator" value="Nami"> Cat Burgler Nami <br>
                </div>
                <div class="question">
                    <label>Who has the highest bounty in the Straw Hat Pirates?</label><br>
                    <input type="radio" name="bounty" value="Zoro"> Pirate Hunter Zoro <br>
                    <input type="radio" name="bounty" value="Luffy"> Monkey D. Luffy <br>
                    <input type="radio" name="bounty" value="Jinbe">  First Son of the Sea Jinbe<br>
                    <input type="radio" name="bounty" value="Franky"> Cyborg Franky <br>
                </div>
                <div class="question">
                    <label>Who is the cutest Straw Hat Pirate?</label><br>
                    <input type="radio" name="cutest" value="Robin"> Robin <br>
                    <input type="radio" name="cutest" value="Nami"> Nami <br>
                    <input type="radio" name="cutest" value="Ussop"> Ussop <br>
                    <input type="radio" name="cutest" value="Chopper"> Chopper <br>
                </div>
                <input class="button" type="submit" name="check" value="Check Answers">
            </form>
            <?php
                $points = 0;
                $message1 = "";
                $message2 = "";
                $message3 = "";
                $message4 = "";

                if(isset($_POST["check"])){
                    $vice_cap_ans = $_POST["vice-captin"];
                    $navigator_ans = $_POST["navigator"];
                    $bounty_ans = $_POST["bounty"];
                    $cutest_ans = $_POST["cutest"];

                    if($vice_cap_ans == "Zoro"){
                        $points++;
                        $message1 = "Zoro is the Vice Captin!";
                    } else{
                        $message1 = "{$vice_cap_ans} is NOT the Vice Captin :(";
                    }

                    if($navigator_ans == "Nami"){
                        $points++;
                        $message2 = "Nami is the Navigator!";
                    } else{
                        $message2 = "{$vice_cap_ans} is NOT the Navigator :(";
                    }

                    if($navigator_ans == "Luffy"){
                        $points++;
                        $message3 = "Luffy does have the highest bounty!";
                    } else{
                        $message3 = "{$vice_cap_ans} does NOT the highest bounty :(";
                    }

                    if($navigator_ans == "Chopper"){
                        $points++;
                        $message4 = "Chopper is the cutest of course";
                    } else{
                        $message4 = "{$vice_cap_ans} is not the cutest :(";
                    }
                }
            ?>
        </section>
        <section id="progress">
            <h1>Progress</h1>
            <div class="progress-board">
                <p><?php echo $message1?></p>
                <p>Score: <?php echo $points?></p>

                <p><?php echo $message2?></p>
                <p>Score: <?php echo $points?></p>

                <p><?php echo $message3?></p>
                <p>Score: <?php echo $points?></p>

                <p><?php echo $message4?></p>
                <p>Score: <?php echo $points?></p>
            </div>
        </section>
        <section id="highscore">
            <h1>High Score</h1>
        </section>
    </main>
    <?php include("footer.html"); ?>
</body>
</html>