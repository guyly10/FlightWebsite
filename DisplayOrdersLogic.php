<?php
$sqlCars = "SELECT * FROM cars;";
$resultCars = mysqli_query($conn, $sqlCars);
$cars = array();

$itemIdC = array();
$destinationC = array();
$carGroupC = array();
$DateFromC = array();
$pickupHourC = array();
$DateToC = array();
$dropOffC = array();
$driverAgeC = array();
$CostC = array();

while ($rowCars = mysqli_fetch_assoc($resultCars)){
    for ($idx = 0; $idx < count($items); $idx++){
        if ($rowCars['itemId'] == $items[$idx]){
            array_push($itemIdC, $rowCars['itemId']);
            array_push($destinationC, $rowCars['destination']);
            array_push($carGroupC, $rowCars['carGroup']);
            array_push($DateFromC, $rowCars['DateFrom']);
            array_push($pickupHourC, $rowCars['pickupHour']);
            array_push($DateToC, $rowCars['DateTo']);
            array_push($dropOffC, $rowCars['dropOff']);
            array_push($driverAgeC, $rowCars['driverAge']);
            array_push($CostC, $rowCars['Cost']);
        }
    }
}

$itemIdF = array();
$originF = array();
$DestinationF = array();
$DateFromF = array();
$DateToF = array();
$CostF = array();

$sqlFlight = "SELECT * FROM flights;";
$resultFlight = mysqli_query($conn, $sqlFlight);
$flights = array();

while ($rowFlight = mysqli_fetch_assoc($resultFlight)){
    for ($idx = 0; $idx < count($items); $idx++){
        if ($rowFlight['itemId'] == $items[$idx]){
            array_push($itemIdF, $rowFlight['itemId']);
            array_push($originF, $rowFlight['origin']);
            array_push($DestinationF, $rowFlight['Destination']);
            array_push($DateFromF, $rowFlight['DateFrom']);
            array_push($DateToF, $rowFlight['DateTo']);
            array_push($CostF, $rowFlight['Cost']);
        }
    }
}

$sqlCommercial = "SELECT * FROM commercials;";
$resultCommercial = mysqli_query($conn, $sqlCommercial);

while ($rowComercial = mysqli_fetch_assoc($resultCommercial)){
    for ($idx = 0; $idx < count($items); $idx++){
        if ($rowComercial['itemID'] == $items[$idx]){
            array_push($itemIdF, $rowComercial['itemID']);
            array_push($originF, "TLV");
            array_push($DestinationF, $rowComercial['city']);
            array_push($DateFromF, $rowComercial['goDate']);
            array_push($DateToF, $rowComercial['returnDate']);
            array_push($CostF, $rowComercial['price']);
        }
    }
}

$sqlHotels = "SELECT * FROM hotels;";
$resultHotels = mysqli_query($conn, $sqlHotels);
$hotels = array();

$itemIdH = array();
$destinationH = array();
$DateFromH = array();
$DateToH = array();
$CostH = array();

while ($rowHotels = mysqli_fetch_assoc($resultHotels)){
    for ($idx = 0; $idx < count($items); $idx++){
        if ($rowHotels['itemId'] == $items[$idx]){
            array_push($itemIdH, $rowHotels['itemId']);
            array_push($destinationH, $rowHotels['destination']);
            array_push($DateFromH, $rowHotels['DateFrom']);
            array_push($DateToH, $rowHotels['DateTo']);
            array_push($CostH, $rowHotels['Cost']);
        }
    }
}