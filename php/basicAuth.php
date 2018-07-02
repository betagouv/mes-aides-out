<?php

function getData($prefix, $username, $password, $token) {
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, "{$prefix}{$token}");
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl, CURLOPT_USERPWD, "{$username}:{$password}");

    curl_setopt($curl, CURLOPT_TIMEOUT, 1);
    $response = curl_exec($curl);

    if ($response !== false) {
        curl_close($curl);
        return array('data' => json_decode($response, true));
    } else {
        $error = curl_error($curl);
        $result = array('error' => $error);
        curl_close($curl);
        return $result;
    }
}

?>
