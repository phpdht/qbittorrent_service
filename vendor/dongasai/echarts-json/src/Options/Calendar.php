<?php
/**
 * Created by Dongasai EchartsJson AutoGenerate.
 * 
 * @author: dongasai <1514582970@qq.com>
 * @package dongasai/echarts-json
 */

namespace EchartsJson\Options;

use EchartsJson\AbstractOption;

/**
 * 
 * 日历坐标系组件。
 *
 * 
 */
class Calendar extends AbstractOption {



        /**
         * 组件 ID。默认不指定。指定则可用于在 option 或者 API 中引用组件。
         * @var string $id
         */
         public  $id  ;

        /**
         * 所有图形的 zlevel 值。
 *     zlevel用于 Canvas 分层，不同zlevel值的图形会放置在不同的 Canvas 中，Canvas 分层是一种常见的优化手段。我们可以把一些图形变化频繁（例如有动画）的组件设置成一个单独的zlevel。需要注意的是过多的 Canvas 会引起内存开销的增大，在手机端上需要谨慎使用以防崩溃。
 *     zlevel 大的 Canvas 会放在 zlevel 小的 Canvas 的上面。
         * @var int $zlevel
         */
         public  $zlevel  = 0 ;

        /**
         * 组件的所有图形的z值。控制图形的前后顺序。z值小的图形会被z值大的图形覆盖。
 *     z相比zlevel优先级更低，而且不会创建新的 Canvas。
         * @var int $z
         */
         public  $z  = 2 ;

        /**
         * 
 *     
 *     calendar组件离容器左侧的距离。
 *     left 的值可以是像 20 这样的具体像素值，可以是像 20% 这样相对于容器高宽的百分比，也可以是 left, center, right。
 *     如果 left 的值为 left, center, right，组件会根据相应的位置自动对齐。
         * @var string|int $left
         */
         public  $left  = 80 ;

        /**
         * 
 *     
 *     calendar组件离容器上侧的距离。
 *     top 的值可以是像 20 这样的具体像素值，可以是像 20% 这样相对于容器高宽的百分比，也可以是 top, middle, bottom。
 *     如果 top 的值为 top, middle, bottom，组件会根据相应的位置自动对齐。
         * @var string|int $top
         */
         public  $top  = 60 ;

        /**
         * 
 *     
 *     calendar组件离容器右侧的距离。
 *     right 的值可以是像 20 这样的具体像素值，可以是像 20% 这样相对于容器高宽的百分比。
 *     默认自适应。
         * @var string|int $right
         */
         public  $right  = "auto"  ;

        /**
         * 
 *     
 *     calendar组件离容器下侧的距离。
 *     bottom 的值可以是像 20 这样的具体像素值，可以是像 20% 这样相对于容器高宽的百分比。
 *     默认自适应。
         * @var string|int $bottom
         */
         public  $bottom  = "auto"  ;

        /**
         * 
 *     
 *     日历坐标的整体宽度
 *     注意: 默认cellSize 为20，若设置了width的值, 则cellSize中的宽度强制转为auto;
         * @var int|string $width
         */
         public  $width  = "auto"  ;

        /**
         * 
 *     
 *     日历坐标的整体高度，
 *     注意: 默认cellSize 为20，若设置了height的值, 则cellSize中的高度强制转为auto;
         * @var int|string $height
         */
         public  $height  = "auto"  ;

        /**
         * 必填，日历坐标的范围 支持多种格式
 *     使用示例：
 *     
 *     // 某一年
 *     range: 2017
 *     
 *     // 某个月
 *     range: 2017-02
 *     
 *     // 某个区间
 *     range: [2017-01-02, 2017-02-23]
 *     
 *     // 注意 此写法会识别为[2017-01-01, 2017-02-01]
 *     range: [2017-01, 2017-02]
         * @var int|string|array $range
         */
         public  $range  ;

        /**
         * 
 *     
 *     日历每格框的大小，可设置单值 或数组  第一个元素是宽 第二个元素是高。
 *     支持设置自适应：auto, 默认为高宽均为20
 *     使用示例：
 *     
 *     // 设置宽高均为20
 *     cellSize: 20
 *     
 *     // 设置宽为20，高为40
 *     cellSize: [20, 40]
 *     
 *     // 设置宽高均为40
 *     cellSize: [40]
 *     
 *     // 设置宽高均自适应
 *     cellSize: auto
 *     
 *     // 设置宽自适应，高为40
 *     cellSize: [auto, 40]
         * @var int|array $cellSize
         */
         public  $cellSize  = 20 ;

        /**
         * 
 *     
 *     日历坐标的布局朝向。
 *     可选：
 *     
 *     horizontal
 *     vertical
         * @var string $orient
         */
         public  $orient  = "horizontal"  ;

        /**
         * 设置日历坐标分隔线的样式。
         * @var Calendar\SplitLine $splitLine
         */
         public Calendar\SplitLine $splitLine  ;

        /**
         * 设置日历格的样式
         * @var Calendar\ItemStyle $itemStyle
         */
         public Calendar\ItemStyle $itemStyle  ;

        /**
         * 设置日历坐标中 星期轴的样式
         * @var Calendar\DayLabel $dayLabel
         */
         public Calendar\DayLabel $dayLabel  ;

        /**
         * 设置日历坐标中 月份轴的样式
         * @var Calendar\MonthLabel $monthLabel
         */
         public Calendar\MonthLabel $monthLabel  ;

        /**
         * 设置日历坐标中 年的样式
         * @var Calendar\YearLabel $yearLabel
         */
         public Calendar\YearLabel $yearLabel  ;

        /**
         * 
 *     
 *     图形是否不响应和触发鼠标事件，默认为 false，即响应和触发鼠标事件。
         * @var bool $silent
         */
         public  $silent  = false  ;

  

}