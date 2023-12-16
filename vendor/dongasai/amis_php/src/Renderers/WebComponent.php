<?php

namespace AmisPhp\Renderers;

/**
 * @method $this tag($v)
 * @method $this body($v)
 * @method $this props($v)
 */
class WebComponent extends BaseSchema
{
    public string $type = 'web-component';
}
