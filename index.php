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

                if(isset($_POST["check"])){
                    $answers = array("Zoro", "Nami", "Luffy", "Chopper");
                    $user_answers = array($_POST["vice-captin"], $_POST["navigator"], $_POST["bounty"], $_POST["cutest"]);

                    function check_answer($user_answer, $answer){
                        if($user_answer == $answer){
                            $points++;
                            echo"{$answer} is CORRECT! <br>";
                        } else{
                            echo"{$user_answer} is INCORRECT! :( <br>";
                        }
                    }
                }
            ?>
        </section>
        <section id="progress">
            <h1>Progress</h1>
            <div class="progress-board">
                <?php 
                    for($i = 0; $i < 4; $i++){
                        echo check_answer($user_answers[$i], $answers[$i]);
                        echo "Points: " . $points;
                    }
                ?>
            </div>
        </section>
        <section id="highscore">
            <h1>High Score</h1>
        </section>
    </main>
    <?php include("footer.html"); ?>
</body>
</html>