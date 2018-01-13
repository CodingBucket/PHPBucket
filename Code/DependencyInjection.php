<?php
 
class JeepWrangler
{
    public function __construct(Petrol $fuel)
    {
        $this->fuel = $fuel;
    }
     
    public function refuel($litres)
    {
        return $litres * $this->fuel->getPrice();
    }
}
 
class Petrol
{
    public function getPrice()
    {
        return 130.7;
    }
}
 
$petrol = new Petrol;
$car = new JeepWrangler($petrol);
 
$cost = $car->refuel(60);
