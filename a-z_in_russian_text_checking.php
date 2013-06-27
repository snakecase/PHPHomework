<?php
 
error_reporting(-1);
mb_internal_encoding('utf-8');

$text = "�oc�a��a ��co �o������, �ec�����oe ��� ���� ���������������� ����������
���������� ��������������� ���������� ����o������� ������������ �����������
�������� � 4 ������ ���";
 
$regexp = '/[�-�]*[a-z]+[�-�a-z]*/ui';
$regexpError = '/[a-z]+/';
preg_match_all($regexp, $text, $text);
 
foreach ($text[0] as $word) {
    if (preg_match($regexpError, $word)) {
        $word = preg_replace($regexpError, '[$0]', $word);
        echo "{$word}\n";
    }
}
