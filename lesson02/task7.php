<?php

//7. *Написать функцию, которая вычисляет текущее время и возвращает его в формате с правильными склонениями, например:

//22 часа 15 минут
//21 час 43 минуты

function smartEnd($number, $value, $suffix)
{
    //ключи массива suffix
    $keys = array(2, 0, 1, 1, 1, 2);

    //берем 2 последние цифры
    $mod = $number % 100;

    //определяем ключ окончания
    $suffix_key = $mod > 4 && $mod < 21 ? 2 : $keys[min($mod % 10, 5)];

    return $value . $suffix[$suffix_key];
}

$hours = rand(0, 23);
$minutes = rand(0, 59);

echo "hours : minutes = " . $hours . " : " . $minutes . "<br>";

echo $hours . " " . smartEnd($hours, "час", array("", "а", "ов")) . " 
    " . $minutes . " " . smartEnd($minutes, "минут", array("а", "ы", ""));

?>