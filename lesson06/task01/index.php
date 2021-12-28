<?php
// 1. Создать форму-калькулятор с операциями: сложение, вычитание, умножение,
// деление. Не забыть обработать деление на ноль! Выбор операции можно осуществлять с
// помощью тега <select>.

$mathOperations = ["+", "-", "*", "/"];

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

if (isset($_POST['firstNum']) && isset($_POST['operation']) && isset($_POST['secondNum'])) {

    $firstNum = (float)$_POST['firstNum'];
    $operation = $_POST['operation'];
    $secondNum = (float)$_POST['secondNum'];

    $answer = mathOperation($firstNum, $secondNum, $operation);
}

?>

<h1>Калькулятор</h1>

<form action="#" method="POST">
    <input type="text" name="firstNum" value="<?= $firstNum;?>">
    <select name="operation">
        <?php
            for($i = 0; $i < count($mathOperations); $i++){
                if ($mathOperations[$i] == $operation) { ?>
                    <option value="<?= $mathOperations[$i];?>" selected="selected"><?= $mathOperations[$i];?></option>
                <?php
                } else { ?>
                    <option value="<?= $mathOperations[$i];?>"><?= $mathOperations[$i];?></option>
                <?php
                }
            }
        ?>
    </select>
    <input type="text" name="secondNum" value="<?= $secondNum;?>">
    <input type="submit" value="=">
    <input type="text" name="Answer" value="<?= $answer;?>">
</form>

