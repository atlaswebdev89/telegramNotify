<?php

//Composer autoload
require_once 'vendor/autoload.php';

use atlasTelegramNotify\NotifyTelegram;
use atlasTelegramNotify\Exceptions\NotifyException;




try{
    
    

    $client = new NotifyTelegram ("1785299982:AAEoQxTtZeFtfFENxLTeAu1t5O-Lrz_hYe4", "-453374119");
    
   $response = $client->sendMessageAsync("ПРИВЕТ\nДмитрий\nДорошук");
    //$response =$client->getMe();
   
   
   //print_r($response);
    
    
    
}catch (NotifyException $e) {
    echo $e->getMessage();
}