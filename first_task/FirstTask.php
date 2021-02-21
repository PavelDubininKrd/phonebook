<?php

class FirstTask
{
    /**
     * @param string $left
     * @param string $right
     * @return void
     * @throws Exception
     */
    public function comparisonOfSigns(string $left, string $right): void
    {
        $left_split_marks = $this->validateInput($left);
        $right_split_marks = $this->validateInput($right);
        $left_digits = array_map(array($this, 'markToDigit'), $left_split_marks[0]);
        $right_digits = array_map(array($this, 'markToDigit'), $right_split_marks[0]);
        $left_digits_sum = array_sum($left_digits);
        $right_digits_sum = array_sum($right_digits);

        if ($left_digits_sum > $right_digits_sum) {
            echo 'Left';
        } elseif ($left_digits_sum == $right_digits_sum) {
            echo 'Balance';
        } else {
            echo 'Right';
        }
    }

    /**
     * @param $val
     * @return int
     */
    private function markToDigit($val): int
    {
        if($val == "!") {
            return $val = 2;
        };
        if($val == "?") {
            return $val = 3;
        };
    }

    /**
     * @param $input
     * @return array
     * @throws Exception
     */
    private function validateInput($input): array
    {
        if (!$input) {
            throw new Exception('Empty parameters');
        }
        preg_match_all('/[!?]/', $input, $matches);

        return $matches;
    }
}
