<?php

// use App\Models\User;

function moneyFormat($data, $currency){
    $data = number_format($data);
    $currency = '₦';
    $data = $currency.$data;
    return $data;
}

 function naira(){
    $data = '₦';
    return $data;
}

function GenerateRefs(){
    $ref = substr(str_replace(['+', '=', '/'], '', \base64_encode(random_bytes(15))), 0,20);
    $id = rand(0000,9999);
    $ref = $ref.$id;
    return $ref;
}

function executeCurl($data, $host, $method)
{
    $curl = curl_init();
    curl_setopt_array($curl, [
     CURLOPT_URL => $host,
     CURLOPT_RETURNTRANSFER => true,
     CURLOPT_ENCODING => "",
     CURLOPT_MAXREDIRS => 10,
     CURLOPT_TIMEOUT => 45,
     CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
     CURLOPT_CUSTOMREQUEST => $method,
     CURLOPT_POSTFIELDS => $data,
     CURLOPT_FAILONERROR => 1,
     CURLOPT_HTTPHEADER => [
       "Content-Type: application/json",
       // "Token: zntFmihZ.g9gQAcMzK5st9Mb71uGxqi0H6hI19t3lsNjn"
       "Token: EAgjeZKG.Hazn4C1dhxI7ehgLJjYhLvJij182Ccc0UCTS"
     ],
   ]);
   
   $response = curl_exec($curl);

   if(curl_errno($curl)){
     dd('error:'. curl_errno($curl));
   }else{
   $res = json_decode($response, true);
   return $res;
   }
}









