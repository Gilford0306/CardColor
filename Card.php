<?php
class Card implements JsonSerializable
{
    public $header;
    public $typeNote;
    public $creationDate ;


    public function __construct($header, $type, $date)
    {
        $this->header = $header;
        $this->creationDate  = $date;
        $this->typeNote = $type;
    }

    public function jsonSerialize()
    {
        return get_object_vars($this);
    }

}
class CardFull extends Card
{
    public $text;

    public function __construct($header, $type, $date,$text)
    {
        parent::__construct($header, $type, $date);
        $this->text = $text;
    }

}
class CardColor extends CardFull
{
    public $color;

    public function __construct($header, $type, $date, $text,$color)
    {
        parent::__construct($header, $type, $date, $text);
        $this->color = $color;
    }

}
class CardNumber extends CardFull
{
    public $number;

    public function __construct($header, $type, $date,$text,$number)
    {
        parent::__construct($header, $type, $date,$text);
        $this->number = $number;
    }

}
?>