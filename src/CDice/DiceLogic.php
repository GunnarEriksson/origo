<?php
/**
 * Handles the logic for the dice 100 game.
 */
class DiceLogic
{
    private $dice;
    private $score;
    private $savedScore;

    public function __construct()
    {
        $this->dice = new DiceImage();
        $this->score = 0;
        $this->savedScore = 0;
    }

    public function roll()
    {
        $diceResult = $this->dice->roll();
        if ($diceResult == 1) {
            $this->score = 0;
        } else {
            $this->score += $diceResult;
        }

        return $diceResult;
    }

    public function getDice()
    {
        return $this->dice->getRollAsImageList();
    }

    public function getAccumulatedScore()
    {
        return $this->score;
    }

    public function saveScore()
    {
        $this->savedScore += $this->score;
        $this->score = 0;
    }

    public function getSavedScore()
    {
        return $this->savedScore;
    }
}
