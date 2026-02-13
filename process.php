<?php

$name = $_POST['name'];

$answers = [
    "дом" => "house",
    "кот" => "cat",
    "стул" => "chair"
];

$student = [
    "дом" => strtolower(trim($_POST['dom'])),
    "кот" => strtolower(trim($_POST['kot'])),
    "стул" => strtolower(trim($_POST['stul']))
];

$score = 0;

foreach ($answers as $word => $correct) {
    if ($student[$word] == $correct) {
        $score++;
    }
}

$result = "$name — $score из 3\n";

file_put_contents("results.txt", $result, FILE_APPEND);

?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Результат</title>
</head>
<body>

<h2>Результат</h2>
<p><?php echo "$name, ты набрал $score из 3"; ?></p>

<a href="index.php">Пройти ещё раз</a>

</body>
</html>
