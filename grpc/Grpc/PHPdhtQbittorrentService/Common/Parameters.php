<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: Common.proto

namespace Grpc\PHPdhtQbittorrentService\Common;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * 默认参数
 *
 * Generated from protobuf message <code>Grpc.PHPdhtQbittorrentService.Common.Parameters</code>
 */
class Parameters extends \Google\Protobuf\Internal\Message
{
    /**
     * Generated from protobuf field <code>int32 p1 = 1;</code>
     */
    protected $p1 = 0;
    /**
     * Generated from protobuf field <code>string p2 = 2;</code>
     */
    protected $p2 = '';

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type int $p1
     *     @type string $p2
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Common::initOnce();
        parent::__construct($data);
    }

    /**
     * Generated from protobuf field <code>int32 p1 = 1;</code>
     * @return int
     */
    public function getP1()
    {
        return $this->p1;
    }

    /**
     * Generated from protobuf field <code>int32 p1 = 1;</code>
     * @param int $var
     * @return $this
     */
    public function setP1($var)
    {
        GPBUtil::checkInt32($var);
        $this->p1 = $var;

        return $this;
    }

    /**
     * Generated from protobuf field <code>string p2 = 2;</code>
     * @return string
     */
    public function getP2()
    {
        return $this->p2;
    }

    /**
     * Generated from protobuf field <code>string p2 = 2;</code>
     * @param string $var
     * @return $this
     */
    public function setP2($var)
    {
        GPBUtil::checkString($var, True);
        $this->p2 = $var;

        return $this;
    }

}

