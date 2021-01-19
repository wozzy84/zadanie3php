<?php
$size = htmlspecialchars($_GET["size"]);
$errors = array('size' => '');
$formValidated = false;

if (isset($_GET['submit'])) {
    if (empty($_GET['size'])) {
        $errors['size']  = "To pole nie może być puste";
    } elseif (!is_numeric($_GET['size']) || $_GET['size'] < 0) {
        $errors['size']  = "To pole może zawierać wyłącznie dodatnie liczby";
    } else {
        $formValidated = true;
    }
};

?>

<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./CSS/main.css?v=<?php echo time(); ?>">
    <title>Document</title>
</head>

<body>
    <h1 class="main-title">Stwórz tabliczkę mnożenia</h1>
    <form action="./index.php" method="get">
        <div class="input-group">
            <label class="input__label" for="stars">podaj liczbę rozmiar tabliczki:</label>
            <input class="input__text-input" type="text" name="size">
            <div class="error-text"><?php echo $errors["size"]; ?></div>
        </div>
        <input type="submit" name="submit" value="Start" class="form-button" />
        <table>
            <tr>
                <?php
                if ($formValidated) {
                    for ($n = 0; $n <= $size; $n++) {
                        if ($n === 0) {
                            echo '<td class="cell"></td>';
                        } else {
                            echo '<td class="cell">' . $n . '</td>';
                        }
                    }
                }
                ?>
            </tr>
            <?php
            if ($formValidated) {
                for ($i = 1; $i <= $size; $i++) {
                    echo '<tr>';
                    echo '<td class="cell">' . $i . '</td>';
                    for ($j = 1; $j <= $size; $j++) {
                        $result = $i * $j;
                        if ($i === $j) {
                            echo '<td class="cell pow">' . $result . '</td>';
                        } else {
                            echo '<td class="cell">' . $result . '</td>';
                        }
                    }
                    echo '</tr>';
                }
            }

            ?>
        </table>


</body>

</html>