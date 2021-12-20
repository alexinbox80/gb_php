<?php
// 6. *С помощью рекурсии организовать функцию возведения числа в степень.
// Формат: function power($val, $pow), где $val – заданное число, $pow – степень. Степень int и >0

function power($val, $pow) {

    if ($pow == 0) {
        return 1;
    }

    return $val * power($val, $pow - 1);
}

$a = rand(-25, 25);
$b = rand(1, 25);

echo "a = $a, b = $b <br>";

echo " a ** b = ". power($a, $b) ."<br>";

?>