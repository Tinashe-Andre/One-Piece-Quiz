<!--Written by: Tdre @2025-->

<?php
session_start(); // start session before ANY HTML output
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>One Piece Quiz</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <?php include("header.html"); ?>
    <main>
        <!-- QUIZ SECTION -->
        <section id="quiz">
            <h1>Test Your One Piece Knowledge!</h1>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                <div class="question">
                    <label>Who is the Vice Captain of the Straw Hat Pirates?</label><br>
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
                    <input type="radio" name="bounty" value="Jinbe"> First Son of the Sea Jinbe<br>
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

        <!-- PROGRESS SECTION -->
        <section id="progress">
            <h1>Progress</h1>
            <div class="progress-board">
                <?php 
                if(isset($_POST["check"])){
                    $answers = ["Zoro", "Nami", "Luffy", "Chopper"];
                    $user_answers = [
                        $_POST["vice-captin"] ?? '', 
                        $_POST["navigator"] ?? '', 
                        $_POST["bounty"] ?? '', 
                        $_POST["cutest"] ?? ''
                    ];

                    function check_answer($user_answer, $correct_answer){
                        if($user_answer === $correct_answer){
                            return ["msg" => "{$correct_answer} is CORRECT! <br>", "point" => 1];
                        } else {
                            return ["msg" => "{$user_answer} is INCORRECT! <br>", "point" => 0];
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
                    echo "<strong>Points: $points</strong>";

                    // store score in session
                    $_SESSION["points"] = $points;
                }
                ?>
            </div>

            <?php
            // control when to show the high score form
            $show_highscore_form = false;

            if(isset($_POST["check"])){ 
                if($_SESSION["points"] >= 3){
                    $show_highscore_form = true;
                }
            }
            ?>

            <div class="highscore-form" style="display: <?php echo $show_highscore_form ? 'block' : 'none'; ?>">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
                    <h2>NEW HIGH SCORE</h2>
                    <label>Enter your initials champ:</label><br>
                    <input class="text-box" type="text" name="initials" required><br>
                    <input class="button" type="submit" name="add-to-board" value="Add"><br>
                </form>
            </div>
        </section>

        <?php
        // Initialize highscores array
        $highscores = [];

        if (isset($_COOKIE["highscores"])) {
            $highscores = json_decode($_COOKIE["highscores"], true);
        }

        // Handle new highscore submission
        if (isset($_POST["add-to-board"])) {
            $initials = htmlspecialchars($_POST["initials"]);
            $points = $_SESSION["points"] ?? 0; // get from session

            $highscores[] = ["initials" => $initials, "points" => $points];

            // Sort descending
            usort($highscores, fn($a, $b) => $b["points"] <=> $a["points"]);

            // Keep top 3
            $highscores = array_slice($highscores, 0, 3);

            // Save back to cookie
            setcookie("highscores", json_encode($highscores), time() + (86400 * 7), "/");

            echo "<p style='color:greenyellow; text-align: center;'>High score saved: $initials ($points pts)</p>";
        }
        ?>

        <!-- HIGH SCORE SECTION -->
        <section id="highscore">
            <h1>High Scores</h1>
            <table>
                <caption><i class="fa-solid fa-star"></i> THE 3 BEST PLAYERS <i class="fa-solid fa-star"></i></caption>
                <tr>
                    <th>Rank</th>
                    <th>Score</th>
                    <th>Initial</th>
                </tr>
                <?php 
                if (!empty($highscores)) {
                    foreach ($highscores as $index => $entry) {
                        $rank = $index + 1;
                        $suffix = ($rank == 1) ? 'st' : (($rank == 2) ? 'nd' : 'rd');
                        echo "<tr>
                                <td>{$rank}{$suffix}</td>
                                <td>{$entry['points']}</td>
                                <td>{$entry['initials']}</td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>No highscores yet</td></tr>";
                }
                ?>
            </table>
        </section>
    </main>
    <?php include("footer.html"); ?>
</body>
</html>
