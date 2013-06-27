<?php
 
error_reporting(-1);

$text = "Пocтaвкa мяco гoвядины, бecкостнoe для нужд государственного бюджетного
учреждения здравоохранения Республики Башкoртостан Инфекционная клиническая
больница № 4 города Уфа";
 
$regexp = '/[а-я]*[a-z]+[а-яa-z]*/ui';
$regexpError = '/[a-z]+/';
preg_match_all($regexp, $text, $text);
 
foreach ($text[0] as $word) {
    if (preg_match($regexpError, $word)) {
        $word = preg_replace($regexpError, '[$0]', $word);
        echo "{$word}\n";
    }
}