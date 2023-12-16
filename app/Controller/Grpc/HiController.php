<?php

namespace App\Controller\Grpc;


use Grpc\PHPdhtQbittorrentService\Hello\HelloReply;
use Grpc\PHPdhtQbittorrentService\Hello\HelloRequest;

class HiController
{

    public function sayHello(HelloRequest $user)
    {
        $message = new HelloReply();
        $message->setMsg("Hi: {$user->getName()}, Hello World " . time());

        return $message;
    }


}