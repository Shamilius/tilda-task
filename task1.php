<?php

class Solution
{
    public function printLadder(int $from = 0, int $to = 1000): void
    {
        $currentRowNumber = 1;
        $currentRow = [];

        for ($i = $from; $i <= $to; $i++) {
            $currentRow[] = $i;

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
