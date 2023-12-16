<?php

namespace AmisPhp\Renderers;

/**
 * @method $this name($v)
 * @method $this map($v)
 * @method $this source($v)
 * @method $this placeholder($v)
 * @method self value($v)
 * @method self valueField($v)
 * @method self labelField($v)
 */
class Mapping extends BaseSchema
{
    public string $type = 'map';
}
