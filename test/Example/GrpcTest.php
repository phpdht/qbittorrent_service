<?php

namespace HyperfTest\Example;

use HyperfTest\GrpcTestCase;

/**
 *
 */
class GrpcTest extends GrpcTestCase
{
    public function test1()
    {

        // 这个client是协程安全的，可以复用
        $client = new \App\Grpc\HiClient('127.0.0.1:9503', [
            'credentials' => null,
        ]);

        $request = new \Grpc\HiUser();
        $request->setName('hyperf');
        $request->setSex(1);

        /**
         * @var \Grpc\HiReply $reply
         */
        list($reply, $status) = $client->sayHello($request);

        $message = $reply->getMessage();
        $user    = $reply->getUser();

        dump($message, $user);

    }

}