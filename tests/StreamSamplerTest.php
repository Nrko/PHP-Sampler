<?php
namespace Tests;

use SamplerChallenge\StreamSampler;

class StreamSamplerTest extends \PHPUnit\Framework\TestCase
{
    use Fixtures;

    /**
     * @test
     * @expectedException \SamplerChallenge\Exceptions\EmptyInputException
     * @expectedExceptionMessage The input is empty
     * 
     * Only testing for empty string because invalid 
     * types are caught by PHP7 through type hinting
     */
    public function itThrowsAnExceptionIfInputIsEmpty()
    {
        new StreamSampler('');
    }
    
    /** @test */
    public function itGivesBackARandomSampleOf5Characters()
    {
        $this->givenAnInput('thisIsTheMostRandomStringEver');
        $this->whenITakeASampleOfSize(5);
        $this->thenTheSampleSizeShouldBe(5);
    }

    /** @test */
    public function allTheCharactersInTheSampleAreContainedWithinTheOriginalInput()
    {
        $this->givenAnInput('thisIsTheMostRandomStringEverForSure');
        $this->whenITakeASampleOfSize(5);
        $this->thenAllTheSampleCharactersShouldBeContainedWithinTheInput();
    }
}