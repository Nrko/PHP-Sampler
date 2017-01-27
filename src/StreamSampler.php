<?php

namespace SamplerChallenge;

use SamplerChallenge\Exceptions\EmptyInputException;

class StreamSampler implements Sampler
{
    /** @var string */
    public $data;

    public function __construct(string $input)
    {
        $this->guardAgainstEmptyInput($input);

        $this->data = $input;
    }

    public function sample(int $size)
    {
        $sample = [];
        $i = 0;

        foreach (str_split($this->data) as $character) {
            if ($i < $size) {
                $sample[$i] = $character;
            } else {
                $random = (int) mt_rand(0, $i);
                if ($random < $size) {
                    $sample[$random] = $character;
                }
            }

            $i++;
        }

        return implode('', $sample);
    }

    public function guardAgainstEmptyInput(string $input)
    {
        if ($input == '') {
            throw new EmptyInputException('The input is empty');
        }
    }
}