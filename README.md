# TelegramBot for Group in telegram

## Простой класс для оповещения в телеграмм о новых запросах с сайта 

### Создаем бота через BotFather (получаем токен ID)

### Создаем группу в telegram и добавляем туда нашего бота 

Активируем бота в чате группы командой /start

### Установка
```php
    composer require atlas89/telegram-notify-order
```
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
    $response = $client->sendMessages("здесь указываем текст сообщения");
```
***************************************
### Дополнительные методы 

**Получение информации о боте**

```php
    $response = $client->getMe();
```
