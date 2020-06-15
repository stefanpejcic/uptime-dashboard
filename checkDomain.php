<?php
if (isset($_GET['domain']))
    echo checkDomain($_GET['domain']);

function checkDomain($domain){
    $starttime = microtime(true);
    
    $port = 80;
    if (strpos($purgeURL,'https://') !== false)
        $port = 443;
    
    $domain = str_replace("http://", "", $domain);
    $domain = str_replace("https://", "", $domain);
        
    $file      = @fsockopen($domain, $port, $errno, $errstr, 10);
        
    $stoptime  = microtime(true);
    $status    = 0;

    if (!$file){
        $status = -1; 
    }
    else{
        fclose($file);
        $status = ($stoptime - $starttime) * 1000;
        $status = floor($status);
    }
    return $status;
}
?>