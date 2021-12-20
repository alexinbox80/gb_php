<?php
// 4. Реализовать функцию с тремя параметрами: function mathOperation($arg1, $arg2, $operation),
// где $arg1, $arg2 – значения аргументов, $operation – строка с названием операции.
// В зависимости от переданного значения операции выполнить одну из арифметических операций (использовать функции
// из пункта 3) и вернуть полученное значение (использовать switch).

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

$a = rand(0, 25);
$b = rand(0, 25);

echo "a = $a, b = $b <br>";

echo "sum = " . mathOperation($a, $b, "+") . "<br>";
echo "dif = " . mathOperation($a, $b, "-") . "<br>";
echo "mul = " . mathOperation($a, $b, "*") . "<br>";
echo "div = " . mathOperation($a, $b, "/") . "<br>";

?>