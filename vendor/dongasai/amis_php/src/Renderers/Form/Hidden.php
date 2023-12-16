<?php

namespace AmisPhp\Renderers\Form;


/**
 * 隐藏字段
 * @method $this name($v)
 * @method $this value($v)
 */
class Hidden extends FormBase
{
    public string $type = 'hidden';
}
