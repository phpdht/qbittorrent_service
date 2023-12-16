<?php

namespace AmisPhp\Renderers\Action;

use AmisPhp\Renderers\Button;

/**
 * @method $this blank($v)
 * @method $this url($v)
 */
class UrlAction extends Button
{
    public string $actionType = 'url';
}
