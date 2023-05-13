<?php

// datadriven applikation om hundar, dvs info om hundar och kunna visa upp denna info

// lagra info om en hund, en klass Dog
// lagra info om alla hundar, dvs en array av Dog-objekt

// visa info om en Dog resp flera, visa info = output HTML, klass RenderDog
// =============================================================================

// DEL 1: Vår data och funktionalitet

class Dog { //klass Dog som håller/tilldelar värdena enskilda objekt(hund) ska ha. Objekten som tilldelas kommer ärva dessa värden men ha olika egenskaper
    // egenskap = en variabel inne i ett objekt
    private $name = ""; //private, icke global pga all kod ska inte ha tillgång tilla kod. "" är en sträng. definerar vaiabel
    private $color = ""; // "" är en sträng. definerar variabel
    private $age = 0; // 0 är en int. definerar variabel
    private $breed = "";
    private $weight = 0;
    private $height = 0;

    // konstruktor. Konstruktor som definerar/skapar default värden för varje nytt objekt. Så vi senare i Doghotell vet att första värdet är name och string
    function __construct(string $name, string $color, int $age, string $breed, float $weight, float $height) { // tar emot argumenten $name, $color, $age och med strin/int förytydligar deras värde
        $this->name = $name; // i JS this.name = name. //säger att this.name är $name
        $this->color = $color;
        $this->age = $age;
        $this->breed = $breed;
        $this->weight = $weight;
        $this->height = $height;
    }

    // metod = funktion inne i objekt som innehåller värdena vi skapat
    function getInfo(): string { //objektet ska vara en string
        return "Name: {$this->name}, Color: {$this->color}, Age: {$this->age}, Breed: {$this->breed}, Weight: {$this->weight}, Height: {$this->height}"; //returnera variabler och tilldelad konstruktor ihop. Definerar 
    }

    function getName(): string {
        return "Name: {$this->name}";
    }
}

class DogHotell { //ny klass med vilka hundar som är inskrivna på hotellet
    private $dogs = []; //deklarerar arrayen av hundar. Tom, ska passa in värden

    function __construct($dogs) { //konstruktor som säger att variabel $dogs är dogs genom att passa in den som ett argument. Constuctor definerar de framtida objekten
        $this->dogs = $dogs;
    }

    function getDogs() {
        return $this->dogs;
    }
}

class RenderDog { //klass för att rendera dog-objekten och skriva ut

    function renderDogInfo(Dog $dog): string {// in i Dog-klassen  och säg att en $Dog med tilldelade värden är dog
        return "<p>{$dog->getInfo()}</p>"; // kör funktionen getInfo i $dog för att få ut en och en
    }

}

class RenderName {

    function renderDogName(Dog $dog): string {
        return "<li>{$dog->getName()}</li>";
    }
}


// DEL 2: Vår app

//$testDog = new Dog("Pluto","orange", 12);
$myDogs = new DogHotell([ //array med hundar som tilldelas i klassen DogHotell
    new Dog("Pluto","orange", 12, "Airdale terrier", 13.416, 42.340), //enskild ny hund in och körs med konstruktorn för att defineras i klassen Dog
    new Dog("Pricken","svart-vit", 3, "Amstaff", 16.783, 35.043),
    new Dog("Lady","beige", 5, "Tax", 6.902, 16.04),
    new Dog("Fox","red", 4, "Varghund", 23.905, 57.943),
    new Dog("Marre","svart", 1, "Amstaff", 9.695, 27.034),
    new Dog("Voff","rosa", 10, "Dalmatin", 14.506, 35.104),
    new Dog("Hund","brown", 5, "Labrador", 13.943, 38.679),
]);

$render = new RenderDog();
$renders = new RenderName();


// DEL 3: Vår output = echo HTML
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>demo-dog-php</title>
</head>
<body>
    
    <h1>My Dog</h1>
    <?php
        //echo "<p>Name: {$testDog->name} </p>";
        //echo "<p>Color: {$testDog->color} </p>";

        foreach($myDogs->getDogs() as $dog) { //loopa igenom myDogs arrayen som är new DogHotell med renderar lista
            echo $render->renderDogInfo($dog); //skriv ut varje hund genom att gå in i funktionen render som i sin tur är klassen renderdog ...
            //som i sin tur kör funktionen renderDogInfo som går in och skriver ut från/i klassen dog och definerart värden och egenskaper
        }
    ?>

        <h1>&#128054; My Dogs by Name &#128054;</h1>
        <ul>
    <?php
        foreach($myDogs->getDogs() as $dog) {
                echo $renders->renderDogName($dog);
        }
    ?>
        </ul>

</body>
</html>