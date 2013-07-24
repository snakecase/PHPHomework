<?php

error_reporting(-1);
mb_internal_encoding('utf-8');

$text = <<<EOF
Пocтaвкa мяco гoвядины, бecкостнoe для нужд государственного бюджетного
учреждения здравоохранения Республики Башкoртостан Инфекционная клиническая
больница № 4 города Уфа
3opя.
12;Ёлкa;12
EOF
;

$regexp = '/[а-яё]*[a-z3]+[а-яёa-z3]*/ui';
$regexpLatinLetter = '/[a-z3]/i';
 
preg_match_all($regexp, $text, $matches, PREG_SET_ORDER);
 
foreach ($matches as $array) {
    echo "Опечатка в слове {$array[0]}: ";
    echo preg_replace($regexpLatinLetter, '[$0]', $array[0]);
    echo "\n";
}
