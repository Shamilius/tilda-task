<?php

class Matrix
{
    private $matrix;
    private $maxValueGenerated;

    public function __construct(int $rows = 5, int $cols = 7, int $maxValue = 1000)
    {
        if ($rows < 2 || $cols < 2) {
            throw new Exception('Matrix can\'t be less than 2x2');
        }

        $maxValueGenerated = 0;
        $matrix = [];

        for ($row = 0; $row < $rows; $row++) {
            $matrix[$row] = [];

            for ($col = 0; $col < $cols; $col++) {
                $number = random_int(1, $maxValue);
                $maxValueGenerated = max($maxValueGenerated, $number);
                $matrix[$row][] = $number;
            }
        }

        $this->matrix = $matrix;
        $this->maxValueGenerated = $maxValueGenerated;
    }

    public function stringify(): string
    {
        $rows = count($this->matrix);
        $length = strlen((string)$this->maxValueGenerated);

        $result = "[\n";

        for ($i = 0; $i < $rows; $i++) {
            $row = [];

            foreach ($this->matrix[$i] as $number) {
                $row[] = str_pad((string)$number, $length, ' ', STR_PAD_LEFT);
            }

            $result .= '  [' . implode(', ', $row) . "]\n";
        }

        $result .= "\n]\n";

        return $result;
    }

    public function getRowsSum(): string
    {
        $result = "[\n";

        for ($rowNum = 1, $rowsCnt = count($this->matrix); $rowNum <= $rowsCnt; $rowNum++) {
            $rowSum = array_sum($this->matrix[$rowNum - 1]);
            $result .= "  {$rowNum}: {$rowSum}\n";
        }

        $result .= "]\n";

        return $result;
    }

    public function getColsSum(): string
    {
        $resultArr = [];
        $rowsCnt = count($this->matrix);
        $colsCnt = count($this->matrix[0]);

        for ($colIndex = 0; $colIndex < $colsCnt; $colIndex++) {
            $colSum = 0;

            for ($rowIndex = 0; $rowIndex < $rowsCnt; $rowIndex++) {
                $colSum += $this->matrix[$rowIndex][$colIndex];
            }

            $resultArr[] = ($colIndex + 1) . ': ' . $colSum;
        }

        return "[\n  " . implode(' ', $resultArr) . "\n]\n";
    }
}

$matrix = new Matrix();

echo $matrix->stringify();
echo 'Суммы по строкам: ' . $matrix->getRowsSum();
echo 'Суммы по колонкам: ' . $matrix->getColsSum();

