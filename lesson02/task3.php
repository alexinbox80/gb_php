<?php
//3. Реализовать основные 4 арифметические операции в виде функций с двумя параметрами.
// Обязательно использовать оператор return.

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

$a = rand(0, 25);
$b = rand(0, 25);

echo "a = $a, b = $b <br>";

echo "sum = " . sum($a, $b) . "<br>";
echo "dif = " . dif($a, $b) . "<br>";
echo "mul = " . mul($a, $b) . "<br>";
echo "div = " . div($a, $b) . "<br>";

?>