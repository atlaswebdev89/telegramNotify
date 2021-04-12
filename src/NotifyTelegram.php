<?php

namespace atlasTelegramNotify;

use atlasTelegramNotify\Exceptions;
use atlasTelegramNotify\Interfaces;

use GuzzleHttp\Client;
use GuzzleHttp\Psr7\Request;
use Respect\Validation\Validator as V;
use \Respect\Validation\Exceptions\ValidationException;

class NotifyTelegram implements Interfaces\NotifyTelegramInterface{
    
    public $token;
    public $chatID;
    public $uri_api = "https://api.telegram.org/bot";
    
    public function __construct($token = null, $chat_id =null) {
        if(isset($token) && !empty($token)) 
            $this->token = $token;
        if(isset($chat_id) && !empty($chat_id))
            $this->chatID = $chat_id;
    }
    
    //Задать токен
    public function setToken ($token) {
        if(isset($token) && !empty($token)) {
            $this->token = $token;
        }
    }
    
    //Получение токена
    public function getToken() {
        if(isset($this->token) && !empty($this->token)) {
            return $this->token;
        }else {
            throw new Exceptions\NotifyException ("Токен не найден!!!\n");
        }
    }
    
    //Задать чат ID
    public function setChatID ($chat_id) {
        if(isset($chat_id) && !empty($chat_id)) {
            $this->chatID = $chat_id;
        }
    }
    
    //Получить chatID
    public function getChatID() {
        if(isset($this->chatID) && !empty($this->chatID)) {
            return $this->chatID;
        }else {
            throw new Exceptions\NotifyException ("Chat_id не найден!!!\n");
        }
    }
    
    //Получение uri API
    protected function getApiUri($method, $params =[]) {
    $uri = $this->uri_api.$this->getToken()."/".$method;
            if(!empty($params)) {
                $uri.="?".http_build_query($params);
            }
        return $uri;
    }
    
    protected function query ($method, $params=[]){
                $client = new Client ([
                    'base_uri' => $this->getApiUri($method, $params)
                ]);
            $result = $client->request('GET');
       return json_decode($result->getBody());
    }
   
    //Функция отправки уведомления
    public function sendMessages($text = "") {
            $response = $this->query("sendMessage", [
                'text'=>$text,
                'chat_id' => $this->getChatID(),
            ]);
        return $response;
    }
    
    //Функция получения информации о боте
    public function getMe () {
        return $this->query("getMe");
    }
    
    //тестовой метод
    public function test($param) {
        return $param;
    }
    
    
}
