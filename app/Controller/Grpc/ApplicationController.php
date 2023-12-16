<?php

namespace App\Controller\Grpc;


use Grpc\PHPdhtQbittorrentService\Application\VersionReply;
use Grpc\PHPdhtQbittorrentService\Common\Parameters;

/**
 *
 */
class ApplicationController
{
    public function version(Parameters $parameters)
    {
        $message = new VersionReply();
        $message->setVersion('version ; 1');

        return $message;
    }


}