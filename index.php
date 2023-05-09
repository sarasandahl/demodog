<?php

// datadriven applikation om hundar, dvs info om hundar och kunna visa upp denna info

// lagra info om en hund, en klass Dog
// lagra info om alla hundar, dvs en array av Dog-objekt

// visa info om en Dog resp flera, visa info = output HTML, klass RenderDog
// =============================================================================

// DEL 1: Vår data och funktionalitet

class Dog {
    // egenskap = en variabel inne i ett objekt
    public $name = "";
    public $color = "";

    function __construct($name, $color) {
        $this->name = $name; // i JS this.name = name
        $this->color = $color;
    }
}

class RenderDog {

}

// DEL 2: Vår app

$testDog = new Dog("Pluto","orange");
//$render = new RenderDog();

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
        echo "<p>Name: {$testDog->name} </p>";
        echo "<p>Color: {$testDog->color} </p>";
    ?>

</body>
</html>