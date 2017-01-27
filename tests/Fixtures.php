<?php
namespace Tests;

use SamplerChallenge\StreamSampler;

trait Fixtures
{
    public $input;

    public $sample;

    protected function givenAnInput(string $input)
    {
        $this->input = $input;
    }

    protected function whenITakeASampleOfSize($size)
    {
        $this->sample = (new StreamSampler($this->input))->sample($size);
    }

    private function thenTheSampleSizeShouldBe($size)
    {
        $this->assertEquals($size, mb_strlen($this->sample));
    }

    private function thenAllTheSampleCharactersShouldBeContainedWithinTheInput()
    {
        for ($i = 0; $i < mb_strlen($this->sample); $i++) {
            $this->assertContains($this->sample[$i], $this->input);
        }
    }
}