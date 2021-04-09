#TelegramBot for Group in telegram

##Простой класс для оповещения в телеграмм о новых запросах с сайта 

### Установка

### Использование
***************************************
**Создание объекта класса** 
```php
    $client = new \atlasTelegramNotify\NotifyTelegram ("token", "chat_id");
```
> где,     
>    token - идентификатор бота, получаем при создании бота в телеграмме (через Botfather)   
>    chat_id - идентификатор группы кода добавлен чат бот

**Или без конструктора класса**
```php
    $client = new \atlasTelegramNotify\NotifyTelegram ();
    $client->setToken("token");
    $client->setChatID("chat_id");
```

**Отправка сообщения в группу телеграмм, куда мы добавили бота**

```php
    $response = $client->sendMessages("здесь указываем текс сообщения");
```

###Дополнительные методы 
***********************************
**Получение информации о боте**

```php
    $response = $client->getMe();
```
