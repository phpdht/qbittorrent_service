<?php

namespace AmisPhp\Pro;


abstract class BaseSchemaRender implements BaseRenderInterface, \Stringable, \JsonSerializable
{

    /**
     * @return static
     */
    public static function make(): self
    {
        return new static();
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
        return $this;
    }

    public function __get($name)
    {
        return $this->$name;
    }


    public function __toString()
    {
        return $this->render()->__toString();
    }

    public function __call($name, $arguments)
    {
        $argument = $arguments[0];
        if ($argument instanceof \Closure) {
            $argument = $argument();
        }
        $this->$name = $argument;
        return $this;
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize()
    {
        return $this->render()->jsonSerialize();
    }


}