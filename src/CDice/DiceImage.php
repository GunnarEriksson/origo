<?php
/**
 *  A dice with images as graphical representation.
 */
class DiceImage extends Dice
{
    const NUM_OF_FACES = 6;

    public function __construct()
    {
        parent::__construct(self::NUM_OF_FACES);
    }

    public function getRollAsImageList()
    {
        $html = "<ul class='dice'>";
        $html .= "<li class='dice-{$this->value}'></li>";
        $html .= "</ul>";
        return $html;
    }
}
