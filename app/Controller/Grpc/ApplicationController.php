<?php

namespace App\Controller\Grpc;


use App\Logic\Qbittorrent;
use Grpc\PHPdhtQbittorrentService\Application\VersionReply;
use Grpc\PHPdhtQbittorrentService\Common\Parameters;

/**
 *
 */
class ApplicationController
{

    public function version(Parameters $parameters)
    {
        $qbt     = Qbittorrent::init();
        $message = new VersionReply();
        $message->setVersion($qbt->application()->getApplicationVersion()->getContents());

        return $message;
    }


}