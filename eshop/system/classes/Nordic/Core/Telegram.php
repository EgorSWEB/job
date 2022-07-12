<?php

namespace Nordic\Core;

class Telegram {

    private $token;

    public function __construct($token = NULL){
        $this->token = $token;
    }

    public function sendMessage($chat_id, $text) {
        file_get_contents("https://api.telegram.org/bot".$this->token."/sendMessage?chat_id=$chat_id&text=$text&parse_mode=HTML");
    }

    public function sendPhoto($chat_id, $photo) {
        file_get_contents("https://api.telegram.org/bot".$this->token."/sendPhoto?chat_id=$chat_id&photo=$photo");
    }

    public function sendLocation($chat_id, $latitude, $longitude) {
        file_get_contents("https://api.telegram.org/bot".$this->token."/sendLocation?chat_id=$chat_id&latitude=$latitude&longitude=$longitude");
    }

}