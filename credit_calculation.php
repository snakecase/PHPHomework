<?php

error_reporting(-1);
mb_internal_encoding('utf-8');

function getCreditResult($creditSum, $payout, $percent, $comission, $oneTimeComission) {
    
    $creditSum += $oneTimeComission;
    $creditBalance = $creditSum;
    
    for ($month = 1; $creditSum > 0; $month++) {
    
        $creditBalance = $creditBalance * $percent + $comission;
        $creditSum = $creditSum * $percent + $comission;
        
        if ($creditSum < $payout) {
            $payout = $creditSum;
        }
        
        $creditSum -= $payout;
    }
    
    $month = $month - 1;
    return array(
        "result"    =>  round($creditBalance, 2),
        "month"     =>  $month
        );
}

$creditSum = 76000;
$payout = 9000;

$homeCredit = getCreditResult($creditSum, $payout, 1.07, 700, 0);
$softbank = getCreditResult($creditSum, $payout, 1.05, 1200, 0);
$strawberryBank = getCreditResult($creditSum, $payout, 1.02, 0, 8000);

echo "����� �������: {$creditSum}.\n";
echo "����: homeCredit. � �������: {$homeCredit['result']} ���. ���� ���������: {$homeCredit['month']} ���.\n";
echo "����: softbank. � �������: {$softbank['result']} ���. ���� ���������: {$softbank['month']} ���.\n";
echo "����: strawberryBank. � �������: {$strawberryBank['result']} ���. ���� ���������: {$strawberryBank['month']} ���.\n";