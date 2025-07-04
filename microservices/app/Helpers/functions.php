<?php

function initGuzzle($param = null)
{
    $client = new \GuzzleHttp\Client($param);
    return $client;
}

function checkIPType($ip) {
    // Periksa apakah IP adalah IPv4 yang valid
    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)) {
        // Periksa apakah IP bukan privat (artinya publik)
        if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4 | FILTER_FLAG_NO_PRIV_RANGE)) {
            return true;
        }
    }
    return false;
}

function dbConnect()
{
    $db = new \App\Config\Database();
    return $db->getConnection();
}

function setJSON($data, $statusCode = 200)
{
    $res = new \App\Cores\Response();
    // You may want to send a JSON response here, for example:
    $res->setJSON($data, $statusCode);
}