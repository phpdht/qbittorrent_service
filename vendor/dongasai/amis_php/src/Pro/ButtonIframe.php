<?php

namespace AmisPhp\Pro;

use AmisPhp\AmisPhp;
use AmisPhp\Renderers\BaseSchema;
use AmisPhp\Renderers\Button;
use AmisPhp\Renderers\Dialog;
use AmisPhp\Renderers\IFrame;


/**
 * 打开弹窗Iframe的按钮
 *
 * @method self title(string $v)
 * @method self src(string $v)
 * @method self size(string $v)
 * @method self height(string $v)
 */
class ButtonIframe extends BaseSchemaRender
{

    public $size   = 'lg';
    public $height = '600px';

    public $iframe;
    /**
     * @var Dialog $dialog
     */
    public $dialog;

    public function size_md()
    {
        $this->height = '300px';
        $this->size   = 'md';
        return $this;
    }

    public function init()
    {
        $did= uniqid();
        if(!$this->iframe){
            $src = $this->src;
            if(strpos($src,'?')){
                $src.='&in_iframe=1';
            }else{
                $src.='?in_iframe=1';
            }
            $this->iframe = IFrame::make()->width("100%")->height($this->height)->src($src);

            $event = [
                'click' => [
                    'actions' => [
                        [
                            "actionType"  => "confirm",
                            "componentId" => $did
                        ]
                    ]
                ]
            ];
            $this->dialog = Dialog::make()->id($did)
                ->size($this->size)
                ->title($this->title)
                ->body($this->iframe)
                ->showCloseButton(false)
                ->actions([
                              (new Button())->label('关闭')->onEvent($event)
                          ]);
        }

    }

    public function render(): BaseSchema
    {
        $this->init();
//        dump($this->dialog);

        return (Button::make())->label($this->title)->actionType("dialog")->dialog($this->dialog);
    }


}
