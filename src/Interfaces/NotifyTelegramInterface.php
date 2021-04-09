<?php

namespace atlasTelegramNotify\Interfaces;

interface NotifyTelegramInterface {
    
    //Функция отправки оповещения в telegram
    public function sendMessages ($text);

}
