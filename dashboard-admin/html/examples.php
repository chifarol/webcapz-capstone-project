<?php
define('MY_CONSTANT', 10);
echo (MY_CONSTANT);
class Fruit
{
    const LEAVING_MESSAGE = "Thank you for visiting W3Schools.com!";
    public $name;
    public $color;
    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
    }
    protected function intro()
    {
        echo "The fruit is {$this->name} and the color is {$this->color}.";
    }
}

class Strawberry extends Fruit
{
    public function intro()
    {
        echo "The fruit is {$this->name} of the color  {$this->color}.";
        echo "<br>";
        echo self::LEAVING_MESSAGE;
    }
    static function message()
    {
        echo "Am I a fruit or a berry? ";
    }
}

// Try to call all three methods from outside class
$strawberry = new Strawberry("Strawberry", "red");  // OK. __construct() is public
$strawberry->message(); // OK. message() is public
echo "<br>";
$strawberry->intro(); // ERROR. intro() is protected and can't be called from outside the class even though inherited
echo "<br>";
echo Fruit::LEAVING_MESSAGE;
echo "<br>";
echo Strawberry::message();
