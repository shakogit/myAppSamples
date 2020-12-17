<?php

require 'inc.address.php';
//------------------------

/*
    *** Define class (Address) Instance 
*/

// >> set | new Object ------|
$address = new Address;
//end of object --------------|

// create emty class
echo '<h4>:: create empty class ::</h4>';
echo '<tt><pre>'. var_export($address, TRUE) .'<pre/><tt/>';


// create class public member objects -------------|
$address->stradd_1 = '#10 Bagebi second deadlock';
$address->stradd_2 = '#55 Saakadze str.';
$address->cityName = 'Tbilisi';
$address->subdivision = 'Region';
$address->postal_code = '#01677';
$address->countryName = 'Georgia';

// create class private members objects
$address->_cardNumber = "CN:GE77700000000769";
$address->_id = 'ID: #1008011615';
$address->_mobileNumber = 'Mob:(+955)592 230 520';
//end of objects ----------------------------------|

// >> set class public members ---|
echo '<h3>:: set public objects ::</h3>';
echo '<tt><pre>'. var_export($address, TRUE) .'<pre/><tt/>';
//end of -------------------------|

// >> set | display() --------------------|
echo '<h3>:: call instance from display() ::</h3>';
echo $address->display();

// >> test Magic (__construct) - 1.
echo '<h3>:: Testing Address Magic __construct with an array (1) ::</h3>'; 
$address_1 = new Address(array(
    'stradd_1'=>'lorem Ave #135',
    'stradd_2'=>'Round corner square #22',
    'cityName'=>'Manchester',
    'subdivision'=>'Region Utha',
    'postal_code'=>'#017700',
    'countryName' => 'USA',
    '_cardNumber' => 'US:99902134',
    '_id' => '#100801116',
    '_mobileNumber' => '592 23 05 20',
    
));

echo $address_1->display();

// >> test Magic (__construct) -2.
echo '<h3>:: Testing Address Magic __construct with an array (2) ::</h3>';
$address_2 = new Address(array(
    'stradd_1'=>'steel str #13/34',
    'stradd_2'=>'SteelLorem Avenue #320 ',
    'cityName'=>'Liverpool',
    'subdivision'=>'Region Northlock',
    'postal_code'=>'#99987',
    'countryName' => 'UK',
    '_cardNumber' => 'UK:2343222',
    '_id' => '#678788890',
    '_mobileNumber' => '995 09 87 21',
));

echo $address_2->display();


// >> test Megic __toString()
echo '<h3>:: Testing Address with Magic __toString() ::</h3>';
echo $address_1->display();

?>