<?php
// 2. Создать калькулятор, который будет определять тип выбранной пользователем операции,
// ориентируясь на нажатую кнопку.

function sum($a, $b) {
    return $a + $b;
}

function dif($a, $b) {
    return $a - $b;
}

function mul($a, $b) {
    return $a * $b;
}

function div($a, $b) {
    return $b ? $a / $b : "err";
}

function mathOperation($arg1, $arg2, $operation) {
    switch ($operation) {
        case "+":
            $answer = sum($arg1, $arg2);
            break;
        case "-":
            $answer = dif($arg1, $arg2);
            break;
        case "*":
            $answer = mul($arg1, $arg2);
            break;
        case "/":
            $answer = div($arg1, $arg2);
            break;
        default:
            $answer = "Wrong operations!";
    }

    return $answer;
}

if (isset($_POST['firstNum']) && isset($_POST['operations']) && isset($_POST['secondNum'])) {

    $firstNum = (float)$_POST['firstNum'];
    $operation = $_POST['operations'][0];
    $secondNum = (float)$_POST['secondNum'];

    $answer = mathOperation($firstNum, $secondNum, $operation);
}

?>

<h1>Калькулятор v2.0</h1>

<form action="#" method="POST">
    <input type="text" name="firstNum" value="<?= $firstNum;?>">
    <input type="text" name="secondNum" value="<?= $secondNum;?>">
    <br>
    <br>
    <input type="submit" name="operations[]" value="+">
    <input type="submit" name="operations[]" value="-">
    <input type="submit" name="operations[]" value="*">
    <input type="submit" name="operations[]" value="/">
    <br>
    <br>
    <input type="text" name="Answer" value="<?= $answer;?>">
</form>
