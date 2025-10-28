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
        <!--QUIZ SECTION-->
        <section id="quiz">
            <h1>Test Your One Piece Knowledge!</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
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
        </section>

        <!--PROGRESS SECTION-->
        <section id="progress">
            <h1>Progress</h1>
            <div class="progress-board">
                <?php 
                    if(isset($_POST["check"])){
                        $answers = array("Zoro", "Nami", "Luffy", "Chopper");
                        $user_answers = array($_POST["vice-captin"] ?? '', 
                                              $_POST["navigator"] ?? '', 
                                              $_POST["bounty"] ?? '', 
                                              $_POST["cutest"] ?? '');

                        function check_answer($user_answer, $correct_answer){
                            if($user_answer === $correct_answer){
                                return["msg" => "{$correct_answer} is CORRECT! <br>", "point" => 1];
                            } else{
                                return["msg" => "{$user_answer} is INCORRECT! <br>", "point" => 0];
                            }
                        }

                        $feedback = "";
                        $points = 0;

                        for($i = 0; $i < count($user_answers); $i++){
                            $result = check_answer($user_answers[$i], $answers[$i]);
                            $feedback .= $result["msg"];
                            $points += $result["point"];
                        }

                        echo $feedback;
                        echo"<strong>Points: $points</strong>";
                    }
                ?>
            </div>
        </section>

        <!--HIGH SCORE SECTION-->
        <section id="highscore">
            <h1>High Score</h1>
        </section>
    </main>
    <?php include("footer.html"); ?>
</body>
</html>