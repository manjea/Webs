<?php
$curl = curl_init();

curl_setopt_array($curl, [
	CURLOPT_URL => "https://community-open-weather-map.p.rapidapi.com/weather?&lat=0&lon=0&callback=test&id=2172797&lang=null&units=imperial&mode=xml",
	CURLOPT_RETURNTRANSFER => true,
	CURLOPT_FOLLOWLOCATION => true,
	CURLOPT_ENCODING => "",
 	CURLOPT_MAXREDIRS => 10,
 	CURLOPT_TIMEOUT => 30,
 	CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
 	CURLOPT_CUSTOMREQUEST => "GET",
 	CURLOPT_HTTPHEADER => [
 		"x-rapidapi-host: community-open-weather-map.p.rapidapi.com",
 		"x-rapidapi-key: 03d42a38dfmshfeac857e784f5c0p11c408jsna1327596922a"
	],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
	echo "cURL Error #:" . $err;
} else {
    echo $response;
}
?>