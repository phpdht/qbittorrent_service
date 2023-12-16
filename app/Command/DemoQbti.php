<?php

declare(strict_types=1);

namespace App\Command;

use Fatkulnurk\PHPQbittorrentApi\Qbittorrent;
use Fatkulnurk\PHPQbittorrentApi\Singleton;
use Hyperf\Command\Command as HyperfCommand;
use Hyperf\Command\Annotation\Command;
use Psr\Container\ContainerInterface;

#[Command]
class DemoQbti extends HyperfCommand
{

    public function __construct(protected ContainerInterface $container)
    {
        parent::__construct('demo:qbti');
    }

    public function configure()
    {
        parent::configure();
        $this->setDescription('qbti Demo Command');
    }

    public function handle()
    {
        Singleton::getInstance()->setBaseURI('http://192.168.4.101:31743');
        $qbt = new Qbittorrent();
        $res = $qbt->authentication()->login('admin','admin888');
        dump($res->getContents());
        dump($qbt->application()->getApplicationVersion()->getContents());
        $this->line('Hello Hyperf!', 'info');
    }

}
