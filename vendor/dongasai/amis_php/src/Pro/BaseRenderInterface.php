<?php

namespace AmisPhp\Pro;

use AmisPhp\Renderers\BaseSchema;

interface BaseRenderInterface
{
    public function render(): BaseSchema;

}