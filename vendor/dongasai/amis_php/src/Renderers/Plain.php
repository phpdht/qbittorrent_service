<?php

namespace AmisPhp\Renderers;


/**
 * @method $this tpl($v)
 * @method $this text($v)
 * @method $this inline($v)
 * @method $this placeholder($v)
 */
class Plain extends BaseSchema
{
    public string $type = 'plain';
}
