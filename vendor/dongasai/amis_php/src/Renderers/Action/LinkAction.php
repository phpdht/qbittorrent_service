<?php
namespace AmisPhp\Renderers\Action;
use AmisPhp\Renderers\Button;

/**
 * @method $this link($v)
 */
class LinkAction extends Button
{
    public string $actionType = 'link';
}
