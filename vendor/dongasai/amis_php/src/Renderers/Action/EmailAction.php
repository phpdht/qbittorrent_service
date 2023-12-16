<?php

namespace AmisPhp\Renderers\Action;

use AmisPhp\Renderers\Button;

/**
 * @method $this to($v)
 * @method $this cc($v)
 * @method $this bcc($v)
 * @method $this subject($v)
 * @method $this body($v)
 */
class EmailAction extends Button
{
    public string $actionType = 'email';
}
