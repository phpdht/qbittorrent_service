<?php
/**
 * Created by Dongasai EchartsJson AutoGenerate.
 * 
 * @author: dongasai <1514582970@qq.com>
 * @package dongasai/echarts-json
 */

namespace EchartsJson\Options\SingleAxis\AxisPointer;

use EchartsJson\AbstractOption;

/**
 * 
 * 坐标轴指示器的文本标签。
 *
 * 
 */
class Label extends AbstractOption {



        /**
         * 是否显示文本标签。如果 tooltip.axisPointer.type 设置为 cross 则默认显示标签，否则默认不显示。
         * @var bool $show
         */
         public  $show  = false  ;

        /**
         * 文本标签中数值的小数点精度。默认根据当前轴的值自动判断。也可以指定如 2 表示保留两位小数。
         * @var int|string $precision
         */
         public  $precision  = "auto"  ;

        /**
         * 文本标签文字的格式化器。
 *     如果为 string，可以是例如：formatter: some text {value} some text，其中 {value} 会被自动替换为轴的值。
 *     如果为 function，可以是例如：
 *     参数：
 *     {Object} params: 含有：
 *     {Object} params.value: 轴当前值，如果 axis.type 为 category 时，其值为 axis.data 里的数值。如果 axis.type 为 time，其值为时间戳。
 *     {Array.&lt;Object&gt;} params.seriesData: 一个数组，是当前 axisPointer 最近的点的信息，每项内容为
 *     {string} params.axisDimension: 轴的维度名，例如直角坐标系中是 x、y，极坐标系中是 radius、angle。
 *     {number} params.axisIndex: 轴的 index，0、1、2、...
 *     {
 *         componentType: series,
 *         // 系列类型
 *         seriesType: string,
 *         // 系列在传入的 option.series 中的 index
 *         seriesIndex: number,
 *         // 系列名称
 *         seriesName: string,
 *         // 数据名，类目名
 *         name: string,
 *         // 数据在传入的 data 数组中的 index
 *         dataIndex: number,
 *         // 传入的原始数据项
 *         data: Object,
 *         // 传入的数据值。在多数系列下它和 data 相同。在一些系列下是 data 中的分量（如 map、radar 中）
 *         value: number|Array|Object,
 *         // 坐标轴 encode 映射信息，
 *         // key 为坐标轴（如 x y radius angle 等）
 *         // value 必然为数组，不会为 null/undefined，表示 dimension index 。
 *         // 其内容如：
 *         // {
 *         //     x: [2] // dimension index 为 2 的数据映射到 x 轴
 *         //     y: [0] // dimension index 为 0 的数据映射到 y 轴
 *         // }
 *         encode: Object,
 *         // 维度名列表
 *         dimensionNames: Array&lt;String&gt;,
 *         // 数据的维度 index，如 0 或 1 或 2 ...
 *         // 仅在雷达图中使用。
 *         dimensionIndex: number,
 *         // 数据图形的颜色
 *         color: string
 *     }
 *     
 *     注：encode 和 dimensionNames 的使用方式，例如：
 *     如果数据为：
 *     dataset: {
 *         source: [
 *             [Matcha Latte, 43.3, 85.8, 93.7],
 *             [Milk Tea, 83.1, 73.4, 55.1],
 *             [Cheese Cocoa, 86.4, 65.2, 82.5],
 *             [Walnut Brownie, 72.4, 53.9, 39.1]
 *         ]
 *     }
 *     
 *     则可这样得到 y 轴对应的 value：
 *     params.value[params.encode.y[0]]
 *     
 *     如果数据为：
 *     dataset: {
 *         dimensions: [product, 2015, 2016, 2017],
 *         source: [
 *             {product: Matcha Latte, 2015: 43.3, 2016: 85.8, 2017: 93.7},
 *             {product: Milk Tea, 2015: 83.1, 2016: 73.4, 2017: 55.1},
 *             {product: Cheese Cocoa, 2015: 86.4, 2016: 65.2, 2017: 82.5},
 *             {product: Walnut Brownie, 2015: 72.4, 2016: 53.9, 2017: 39.1}
 *         ]
 *     }
 *     
 *     则可这样得到 y 轴对应的 value：
 *     params.value[params.dimensionNames[params.encode.y[0]]]
 *     
 *     每项内容还包括轴的信息：
 *     {
 *         axisDim: x, // x, y, angle, radius, single
 *         axisId: xxx,
 *         axisName: xxx,
 *         axisIndex: 3,
 *         axisValue: 121, // 当前 axisPointer 对应的 value。
 *         axisValueLabel: 文本
 *     }
 *     
 *     返回值：
 *     显示的 string。
 *     例如：
 *     formatter: function (params) {
 *         // 假设此轴的 type 为 time。
 *         return some text + echarts.format.formatTime(params.value);
 *     }
         * @var string|callable $formatter
         */
         public  $formatter  ;

        /**
         * label 距离轴的距离。
         * @var int $margin
         */
         public  $margin  = 3 ;

        /**
         * 
 *     
 *     文字的颜色。
         * @var string $color
         */
         public  $color  = "#fff"  ;

        /**
         * 
 *     
 *     文字字体的风格。
 *     可选：
 *     
 *     normal
 *     italic
 *     oblique
         * @var string $fontStyle
         */
         public  $fontStyle  = "normal"  ;

        /**
         * 
 *     
 *     文字字体的粗细。
 *     可选：
 *     
 *     normal
 *     bold
 *     bolder
 *     lighter
 *     100 | 200 | 300 | 400...
         * @var string|int $fontWeight
         */
         public  $fontWeight  = "normal"  ;

        /**
         * 
 *     
 *     文字的字体系列。
 *     还可以是 serif , monospace, Arial, Courier New, Microsoft YaHei, ...
         * @var string $fontFamily
         */
         public  $fontFamily  = "sans-serif"  ;

        /**
         * 
 *     
 *     文字的字体大小。
         * @var int $fontSize
         */
         public  $fontSize  = 12 ;

        /**
         * 
 *     
 *     行高。
 *     rich 中如果没有设置 lineHeight，则会取父层级的 lineHeight。例如：
 *     {
 *         lineHeight: 56,
 *         rich: {
 *             a: {
 *                 // 没有设置 `lineHeight`，则 `lineHeight` 为 56
 *             }
 *         }
 *     }
         * @var int $lineHeight
         */
         public  $lineHeight  ;

        /**
         * 
 *     
 *     文本显示宽度。
         * @var int $width
         */
         public  $width  ;

        /**
         * 
 *     
 *     文本显示高度。
         * @var int $height
         */
         public  $height  ;

        /**
         * 
 *     
 *     文字本身的描边颜色。
         * @var string $textBorderColor
         */
         public  $textBorderColor  ;

        /**
         * 
 *     
 *     文字本身的描边宽度。
         * @var int $textBorderWidth
         */
         public  $textBorderWidth  ;

        /**
         * 
 *     
 *     
 *     文字本身的描边类型。
 *     可选：
 *     
 *     solid
 *     dashed
 *     dotted
 *     
 *     自 v5.0.0 开始，也可以是 number 或者 number 数组，用以指定线条的 dash array，配合 
 *     textBorderDashOffset
 *      可实现更灵活的虚线效果。
 *     例如：
 *     {
 *     
 *     textBorderType: [5, 10],
 *     
 *     textBorderDashOffset: 5
 *     }
         * @var string|int|array $textBorderType
         */
         public  $textBorderType  = "solid"  ;

        /**
         * 
 *     从 v5.0.0 开始支持
 *     
 *     
 *     
 *     用于设置虚线的偏移量，可搭配 
 *     textBorderType
 *      指定 dash array 实现灵活的虚线效果。
 *     更多详情可以参考 MDN lineDashOffset。
         * @var int $textBorderDashOffset
         */
         public  $textBorderDashOffset  = 0 ;

        /**
         * 
 *     
 *     文字本身的阴影颜色。
         * @var string $textShadowColor
         */
         public  $textShadowColor  = "transparent"  ;

        /**
         * 
 *     
 *     文字本身的阴影长度。
         * @var int $textShadowBlur
         */
         public  $textShadowBlur  = 0 ;

        /**
         * 
 *     
 *     文字本身的阴影 X 偏移。
         * @var int $textShadowOffsetX
         */
         public  $textShadowOffsetX  = 0 ;

        /**
         * 
 *     
 *     文字本身的阴影 Y 偏移。
         * @var int $textShadowOffsetY
         */
         public  $textShadowOffsetY  = 0 ;

        /**
         * 
 *     
 *     文字超出宽度是否截断或者换行。配置width时有效
 *     
 *     truncate 截断，并在末尾显示ellipsis配置的文本，默认为...
 *     break 换行
 *     breakAll 换行，跟break不同的是，在英语等拉丁文中，breakAll还会强制单词内换行
         * @var string $overflow
         */
         public  $overflow  = "none"  ;

        /**
         * 在overflow配置为truncate的时候，可以通过该属性配置末尾显示的文本。
         * @var string $ellipsis
         */
         public  $ellipsis  = "..."  ;

        /**
         * 
 *     
 *     axisPointer内边距，单位px，默认各方向内边距为5，接受数组分别设定上右下左边距。
 *     使用示例：
 *     // 设置内边距为 5
 *     padding: 5
 *     // 设置上下的内边距为 5，左右的内边距为 10
 *     padding: [5, 10]
 *     // 分别设置四个方向的内边距
 *     padding: [
 *         5,  // 上
 *         10, // 右
 *         5,  // 下
 *         10, // 左
 *     ]
         * @var string|array $padding
         */
         public  $padding  = "[5, 7, 5, 7]"  ;

        /**
         * 文本标签的背景颜色，默认是和 axis.axisLine.lineStyle.color 相同。
         * @var string $backgroundColor
         */
         public  $backgroundColor  = "auto"  ;

        /**
         * 文本标签的边框颜色。
         * @var string $borderColor
         */
         public  $borderColor  ;

        /**
         * 文本标签的边框宽度。
         * @var string $borderWidth
         */
         public  $borderWidth  = "0"  ;

        /**
         * 
 *     
 *     图形阴影的模糊大小。该属性配合 shadowColor,shadowOffsetX, shadowOffsetY 一起设置图形的阴影效果。
 *     示例：
 *     {
 *         shadowColor: rgba(0, 0, 0, 0.5),
 *         shadowBlur: 10
 *     }
         * @var int $shadowBlur
         */
         public  $shadowBlur  = 3 ;

        /**
         * 
 *     
 *     阴影颜色。支持的格式同color。
         * @var string $shadowColor
         */
         public  $shadowColor  = "#aaa"  ;

        /**
         * 
 *     
 *     阴影水平方向上的偏移距离。
         * @var int $shadowOffsetX
         */
         public  $shadowOffsetX  = 0 ;

        /**
         * 
 *     
 *     阴影垂直方向上的偏移距离。
         * @var int $shadowOffsetY
         */
         public  $shadowOffsetY  = 0 ;

  

}