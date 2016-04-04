<?php
/**
 * A dice class to handle the dice.
 */
class Dice
{
    private $faces;
    protected $value;

    public function __construct($faces=6)
    {
        $this->faces = $faces;
    }

    public function roll()
    {
        $this->value = rand(1, $this->faces);

        return $this->value;
    }
}
