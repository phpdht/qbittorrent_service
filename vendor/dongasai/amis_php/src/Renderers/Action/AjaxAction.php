<?php

namespace AmisPhp\Renderers\Action;

use AmisPhp\Renderers\Button;

/**
 * @method $this api($v)
 * @method $this feedback($v)
 * @method $this reload($v)
 * @method $this redirect($v)
 * @method $this ignoreConfirm($v)
 */
class AjaxAction extends Button
{
    public string $actionType = 'ajax';
}
