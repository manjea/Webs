<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
    <form action="#" method="get">
        <fieldset>
            <legend>Weather Data</legend>
            <label for="lon">Longitud</label><br>
            <input type="text" name="lon" id="lon" required><br>
            <label for="lat">Latitude</label><br>
            <input type="text" name="lat" id="lat" required><br>
            <input type="submit" value="Get Weather data" name="s">
        </fieldset>
    </form>

<?php 
$json = file_get_contents('JSONData.json');
$jsonDecoded = json_decode($json, true);
require('env.php');
$API_KEY = $_ENV['API_KEY'];

if(isset($_GET['s'])){
    $lat = $_GET['lat'];
    $lon = $_GET['lon'];

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?&lat=${lat}&lon=${lon}&id=2172797&lang=se&units=metric",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
            "x-rapidapi-key: ${API_KEY}"
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #:" . $err;
    } else {
        $dataArray = json_decode($response, true);
        
        //echo print_r($dataArray);
        //echo $response;
        
        $main = $dataArray['main'];
        $temp = $main['temp'];
        $feels_like = $main['feels_like'];
        $pres = $main['pressure'];
        $hum = $main['humidity'];

        $wind = $dataArray['wind'];
        $spe = $wind['speed'];
        $deg = $wind['deg'];
        $desc = $dataArray['weather'][0]['description'];
        
    }
}
    
    
?>

    <p><span id="lon">Longitud: <?php if(isset($lon)){echo $lon;}else{echo "not set";}; ?></span></p>
    <p><span id="lat">Latitud: <?php if(isset($lat)){echo $lat;}else{echo "not set";}; ?></span></p>
    <?php
        if(isset($_GET['s'])){
            echo '<br>
            <div class="flex-container">
                <div class="grid-container">
                    <div class="side">Temp, FeelsLike</div>
                    <div class="grid-box">'. $temp . '&#176;' .'</div>
                    <div class="grid-box">'. $feels_like . '&#176;' .'</div>
        
                    <div class="side">Pressure, Humidity</div>
                    <div class="grid-box">'. $pres . 'ps' .'</div>
                    <div class="grid-box">'. $hum . '%' .'</div>

                    <div class="side">Wind</div>
                    <div class="grid-box">'. $spe . 'm/s' .'</div>
                    <div class="grid-box">'. $deg . '&#176;' . '<br>(0&#176;=N)' .'</div>                    
                </div>
            </div>';    
        }

    ?>

</body>
</html>
<?php


?>