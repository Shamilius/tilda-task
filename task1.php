<?php

class Solution
{
    public function printLadder(int $from = 0, int $to = 1000): void
    {
        $currentRowNumber = 1;
        $numbersInCurrentRow = 0;
        $padLength = strlen($to) + 1;

        for ($i = $from; $i <= $to; $i++) {
            echo str_pad($i, $padLength, ' ', STR_PAD_LEFT);

            $numbersInCurrentRow += 1;

            if ($numbersInCurrentRow == $currentRowNumber || $i == $to) {
                $numbersInCurrentRow = 0;
                $currentRowNumber += 1;
                echo "\n";
            }
        }
    }
}

$solution = new Solution();
$solution->printLadder();
