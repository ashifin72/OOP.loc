<?php

//Начинаем ООП
class Toad
{
    public $name;
    public $color;
    public $health;
    public $hitPower;

    public function __construct($name, $color)
    {
        $this->name = $name;
        $this->color = $color;
        $this->health = 100;
        $this->hitPower = 10;
    }

    public function sayName()
    {
        echo $this->name;
        $this->br();
    }

    public function showHealth()
    {
        echo $this->health;
        $this->br();
    }

    public function run()
    {
        $this->health--;

    }

    public function jump()
    {
        echo 'Метод gump';
    }

    private function br()
    {
        echo '<br>';
    }
}

$rush = new Toad('Rush', 'green');
$pimple = new Toad('Pimple', 'yellow');

$rush->sayName();
$rush->showHealth();
$rush->run();
$rush->showHealth();
$rush->name = 'NoRush';
$rush->sayName();

class Mosquito
{
    public $health;
    public $hitPower;
    public $lehgthTrunk;

    public function __construct()
    {
        $this->health = 100;
        $this->hitPower = 1;
        $this->lehgthTrunk = rand(1, 10);
    }

    public function lehgth_Trunk()
    {
         echo 'Если длина хоботка' . ' = ' . $this->lehgthTrunk;
        $this->br();
    }
    public function PowerTrunk()
    {

        echo 'Здоровье' . ' = ';
        echo $this->PowerHealth() ;
    }

    public function PowerHealth()
    {
        if($this->lehgthTrunk >= 5){
            echo $this->health + ($this->lehgthTrunk - ($this->lehgthTrunk % 5))/5*10;
        } else {
            echo $this->health;
        }
    }

    private function br()
    {
        echo '<br>';
    }


}

$mosquito = new Mosquito();

$mosquito->lehgth_Trunk();
$mosquito->PowerTrunk();


