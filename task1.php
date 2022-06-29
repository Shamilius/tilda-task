<?php

class Solution
{
    public function printLadder(int $from = 0, int $to = 1000): void
    {
        $currentRowNumber = 1;
        $currentRow = [];
        $padLength = strlen($to);

        for ($i = $from; $i <= $to; $i++) {
            $currentRow[] = str_pad($i, $padLength, ' ', STR_PAD_LEFT);

            if (count($currentRow) == $currentRowNumber) {
                echo implode(' ', $currentRow) . "\n";

                $currentRow = [];
                $currentRowNumber += 1;
            }
        }
    }
}

$solution = new Solution();
$solution->printLadder();
