<?php
/**
 * Created by Dongasai EchartsJson AutoGenerate.
 * 
 * @author: dongasai <1514582970@qq.com>
 * @package dongasai/echarts-json
 */

namespace EchartsJson\Options\Parallel\ParallelAxisDefault;

use EchartsJson\AbstractOption;

/**
 * 
 * 坐标轴刻度标签的相关设置。
 *
 * 
 */
class AxisLabel extends AbstractOption {



        /**
         * 
 *     
 *     是否显示刻度标签。
         * @var bool $show
         */
         public  $show  = true  ;

        /**
         * 
 *     
 *     
 *     
 *     坐标轴刻度标签的显示间隔，在类目轴中有效。
 *     默认会采用标签不重叠的策略间隔显示标签。
 *     可以设置成 0 强制显示所有标签。
 *     如果设置为 1，表示『隔一个标签显示一个标签』，如果值为 2，表示隔两个标签显示一个标签，以此类推。
 *     可以用数值表示间隔的数据，也可以通过回调函数控制。回调函数格式如下：
 *     (index:number, value: string) =&gt; boolean
 *     
 *     第一个参数是类目的 index，第二个值是类目名称，如果跳过则返回 false。
         * @var int|callable $interval
         */
         public  $interval  = "auto"  ;

        /**
         * 
 *     
 *     刻度标签是否朝内，默认朝外。
         * @var bool $inside
         */
         public  $inside  = false  ;

        /**
         * 
 *     
 *     刻度标签旋转的角度，在类目轴的类目标签显示不下的时候可以通过旋转防止标签之间重叠。
 *     旋转的角度从 -90 度到 90 度。
         * @var int $rotate
         */
         public  $rotate  = 0 ;

        /**
         * 
 *     
 *     刻度标签与轴线之间的距离。
         * @var int $margin
         */
         public  $margin  = 8 ;

        /**
         * 刻度标签的内容格式器，支持字符串模板和回调函数两种形式。
 *     示例:
 *     // 使用字符串模板，模板变量为刻度默认标签 {value}
 *     formatter: {value} kg
 *     // 使用函数模板，函数参数分别为刻度数值（类目），刻度的索引
 *     formatter: function (value, index) {
 *         return value + kg;
 *     }
 *     
 *     
 *     对于时间轴（type: time），formatter 的字符串模板支持多种形式：
 *     
 *     字符串模板：简单快速实现常用日期时间模板，string 类型
 *     回调函数：自定义 formatter，可以用来实现复杂高级的格式，Function 类型
 *     分级模板：为不同时间粒度的标签使用不同的 formatter，object 类型
 *     
 *     下面我们分别介绍这三种形式。
 *      字符串模板 
 *     使用字符串模板是一种方便实现常用日期时间格式化方式的形式。如果字符串模板可以实现你的效果，那我们优先推荐使用此方式；如果无法实现，再考虑其他两种更复杂的方式。支持的模板如下：
 *     
 *     
 *     
 *     分类
 *     模板
 *     取值（英文）
 *     取值（中文）
 *     
 *     
 *     
 *     
 *     Year
 *     {yyyy}
 *     e.g., 2020, 2021, ...
 *     例：2020, 2021, ...
 *     
 *     
 *     
 *     {yy}
 *     00-99
 *     00-99
 *     
 *     
 *     Quarter
 *     {Q}
 *     1, 2, 3, 4
 *     1, 2, 3, 4
 *     
 *     
 *     Month
 *     {MMMM}
 *     e.g., January, February, ...
 *     一月、二月、……
 *     
 *     
 *     
 *     {MMM}
 *     e.g., Jan, Feb, ...
 *     1月、2月、……
 *     
 *     
 *     
 *     {MM}
 *     01-12
 *     01-12
 *     
 *     
 *     
 *     {M}
 *     1-12
 *     1-12
 *     
 *     
 *     Day of Month
 *     {dd}
 *     01-31
 *     01-31
 *     
 *     
 *     
 *     {d}
 *     1-31
 *     1-31
 *     
 *     
 *     Day of Week
 *     {eeee}
 *     Sunday, Monday, Tuesday, Wednesday, Thursday, Friday, Saturday
 *     星期日、星期一、星期二、星期三、星期四、星期五、星期六
 *     
 *     
 *     
 *     {ee}
 *     Sun, Mon, Tues, Wed, Thu, Fri, Sat
 *     日、一、二、三、四、五、六
 *     
 *     
 *     
 *     {e}
 *     1-54
 *     1-54
 *     
 *     
 *     Hour
 *     {HH}
 *     00-23
 *     00-23
 *     
 *     
 *     
 *     {H}
 *     0-23
 *     0-23
 *     
 *     
 *     
 *     {hh}
 *     01-12
 *     01-12
 *     
 *     
 *     
 *     {h}
 *     1-12
 *     1-12
 *     
 *     
 *     Minute
 *     {mm}
 *     00-59
 *     00-59
 *     
 *     
 *     
 *     {m}
 *     0-59
 *     0-59
 *     
 *     
 *     Second
 *     {ss}
 *     00-59
 *     00-59
 *     
 *     
 *     
 *     {s}
 *     0-59
 *     0-59
 *     
 *     
 *     Millisecond
 *     {SSS}
 *     000-999
 *     000-999
 *     
 *     
 *     
 *     {S}
 *     0-999
 *     0-999
 *     
 *     
 *     
 *     
 *     其他语言请参考相应语言包中的定义，语言包可以通过 echarts.registerLocale 注册。
 *     
 *     示例:
 *     formatter: {yyyy}-{MM}-{dd} // 得到的 label 形如：2020-12-02
 *     formatter: {d}日 // 得到的 label 形如：2日
 *     
 *      回调函数 
 *     回调函数可以根据刻度值返回不同的格式，如果有复杂的时间格式化需求，也可以引用第三方的日期时间相关的库（如 Moment.js、date-fns 等），返回显示的文本。
 *     示例：
 *     // 使用函数模板，函数参数分别为刻度数值（类目），刻度的索引
 *     formatter: function (value, index) {
 *         // 格式化成月/日，只在第一个刻度显示年份
 *         var date = new Date(value);
 *         var texts = [(date.getMonth() + 1), date.getDate()];
 *         if (index === 0) {
 *             texts.unshift(date.getFullYear());
 *         }
 *         return texts.join(/);
 *     }
 *     
 *      分级模板 
 *     有时候，我们希望对不同的时间粒度采用不同的格式化策略。例如，在季度图表中，我们可能希望对每个月的第一天显示月份，而其他日期显示日期。我们可以使用以下方式实现该效果：
 *     示例：
 *     formatter: {
 *         month: {MMMM}, // 一月、二月、……
 *         day: {d}日 // 1日、2日、……
 *     }
 *     
 *     支持的分级以及各自默认的取值为：
 *     {
 *         year: {yyyy},
 *         month: {MMM},
 *         day: {d},
 *         hour: {HH}:{mm},
 *         minute: {HH}:{mm},
 *         second: {HH}:{mm}:{ss},
 *         millisecond: {hh}:{mm}:{ss} {SSS},
 *         none: {yyyy}-{MM}-{dd} {hh}:{mm}:{ss} {SSS}
 *     }
 *     
 *     以 day 为例，当一个刻度点的值的小时、分钟、秒、毫秒都为 0 时，将采用 day 的分级值作为模板。none 表示当其他规则都不适用时采用的模板，也就是带有毫秒值的刻度点的模板。
 *      富文本 
 *     以上这三种形式的 formatter 都支持富文本，所以可以做成一些复杂的效果。
 *     示例：
 *     xAxis: {
 *         type: time,
 *         axisLabel: {
 *             formatter: {
 *                 // 一年的第一个月显示年度信息和月份信息
 *                 year: {yearStyle|{yyyy}}\n{monthStyle|{MMM}},
 *                 month: {monthStyle|{MMM}}
 *             },
 *             rich: {
 *                 yearStyle: {
 *                     // 让年度信息更醒目
 *                     color: #000,
 *                     fontWeight: bold
 *                 },
 *                 monthStyle: {
 *                     color: #999
 *                 }
 *             }
 *         }
 *     },
 *     
 *     使用回调函数形式实现上面例子同样的效果：
 *     示例：
 *     xAxis: {
 *         type: time,
 *         axisLabel: {
 *             formatter: function (value) {
 *                 const date = new Date(value);
 *                 const yearStart = new Date(value);
 *                 yearStart.setMonth(0);
 *                 yearStart.setDate(1);
 *                 yearStart.setHours(0);
 *                 yearStart.setMinutes(0);
 *                 yearStart.setSeconds(0);
 *                 yearStart.setMilliseconds(0);
 *                 // 判断一个刻度值知否为一年的开始
 *                 if (date.getTime() === yearStart.getTime()) {
 *                     return {year| + date.getFullYear() + }\n
 *                         + {month| + (date.getMonth() + 1) + 月};
 *                 }
 *                 else {
 *                     return {month| + (date.getMonth() + 1) + 月}
 *                 }
 *             },
 *             rich: {
 *                 year: {
 *                     color: #000,
 *                     fontWeight: bold
 *                 },
 *                 month: {
 *                     color: #999
 *                 }
 *             }
 *         }
 *     },
         * @var string|callable $formatter
         */
         public  $formatter  ;

        /**
         * 
 *     
 *     是否显示最小 tick 的 label。可取值 true, false, null。默认自动判定（即如果标签重叠，不会显示最小 tick 的 label）。
         * @var bool $showMinLabel
         */
         public  $showMinLabel  ;

        /**
         * 
 *     
 *     是否显示最大 tick 的 label。可取值 true, false, null。默认自动判定（即如果标签重叠，不会显示最大 tick 的 label）。
         * @var bool $showMaxLabel
         */
         public  $showMaxLabel  ;

        /**
         * 
 *     
 *     
 *     
 *     
 *     从 v5.2.0 开始支持
 *     
 *     是否隐藏重叠的标签。
         * @var bool $hideOverlap
         */
         public  $hideOverlap  ;

        /**
         * 
 *     
 *     刻度标签文字的颜色，默认取 axisLine.lineStyle.color。支持回调函数，格式如下
 *     (val: string) =&gt; Color
 *     
 *     参数是标签的文本，返回颜色值，如下示例：
 *     textStyle: {
 *         color: function (value, index) {
 *             return value &gt;= 0 ? green : red;
 *         }
 *     }
         * @var string|callable $color
         */
         public  $color  ;

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
 *     文字水平对齐方式，默认自动。
 *     可选：
 *     
 *     left
 *     center
 *     right
 *     
 *     rich 中如果没有设置 align，则会取父层级的 align。例如：
 *     {
 *         align: right,
 *         rich: {
 *             a: {
 *                 // 没有设置 `align`，则 `align` 为 right
 *             }
 *         }
 *     }
         * @var string $align
         */
         public  $align  ;

        /**
         * 
 *     
 *     文字垂直对齐方式，默认自动。
 *     可选：
 *     
 *     top
 *     middle
 *     bottom
 *     
 *     rich 中如果没有设置 verticalAlign，则会取父层级的 verticalAlign。例如：
 *     {
 *         verticalAlign: bottom,
 *         rich: {
 *             a: {
 *                 // 没有设置 `verticalAlign`，则 `verticalAlign` 为 bottom
 *             }
 *         }
 *     }
         * @var string $verticalAlign
         */
         public  $verticalAlign  ;

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
 *     文字块背景色。
 *     可以使用颜色值，例如：#123234, red, rgba(0,23,11,0.3)。
 *     也可以直接使用图片，例如：
 *     backgroundColor: {
 *         image: xxx/xxx.png
 *         // 这里可以是图片的 URL，
 *         // 或者图片的 dataURI，
 *         // 或者 HTMLImageElement 对象，
 *         // 或者 HTMLCanvasElement 对象。
 *     }
 *     
 *     当使用图片的时候，可以使用 width 或 height 指定高宽，也可以不指定自适应。
         * @var string|array $backgroundColor
         */
         public  $backgroundColor  = "transparent"  ;

        /**
         * 
 *     
 *     文字块边框颜色。
         * @var string $borderColor
         */
         public  $borderColor  ;

        /**
         * 
 *     
 *     文字块边框宽度。
         * @var int $borderWidth
         */
         public  $borderWidth  = 0 ;

        /**
         * 
 *     
 *     
 *     文字块边框描边类型。
 *     可选：
 *     
 *     solid
 *     dashed
 *     dotted
 *     
 *     自 v5.0.0 开始，也可以是 number 或者 number 数组，用以指定线条的 dash array，配合 
 *     borderDashOffset
 *      可实现更灵活的虚线效果。
 *     例如：
 *     {
 *     
 *     borderType: [5, 10],
 *     
 *     borderDashOffset: 5
 *     }
         * @var string|int|array $borderType
         */
         public  $borderType  = "solid"  ;

        /**
         * 
 *     从 v5.0.0 开始支持
 *     
 *     
 *     
 *     用于设置虚线的偏移量，可搭配 
 *     borderType
 *      指定 dash array 实现灵活的虚线效果。
 *     更多详情可以参考 MDN lineDashOffset。
         * @var int $borderDashOffset
         */
         public  $borderDashOffset  = 0 ;

        /**
         * 
 *     
 *     文字块的圆角。
         * @var int|array $borderRadius
         */
         public  $borderRadius  = 0 ;

        /**
         * 
 *     
 *     文字块的内边距。例如：
 *     
 *     padding: [3, 4, 5, 6]：表示 [上, 右, 下, 左] 的边距。
 *     padding: 4：表示 padding: [4, 4, 4, 4]。
 *     padding: [3, 4]：表示 padding: [3, 4, 3, 4]。
 *     
 *     注意，文字块的 width 和 height 指定的是内容高宽，不包含 padding。
         * @var int|array $padding
         */
         public  $padding  = 0 ;

        /**
         * 
 *     
 *     文字块的背景阴影颜色。
         * @var string $shadowColor
         */
         public  $shadowColor  = "transparent"  ;

        /**
         * 
 *     
 *     文字块的背景阴影长度。
         * @var int $shadowBlur
         */
         public  $shadowBlur  = 0 ;

        /**
         * 
 *     
 *     文字块的背景阴影 X 偏移。
         * @var int $shadowOffsetX
         */
         public  $shadowOffsetX  = 0 ;

        /**
         * 
 *     
 *     文字块的背景阴影 Y 偏移。
         * @var int $shadowOffsetY
         */
         public  $shadowOffsetY  = 0 ;

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
         * 在 rich 里面，可以自定义富文本样式。利用富文本样式，可以在标签中做出非常丰富的效果。
 *     例如：
 *     label: {
 *         // 在文本中，可以对部分文本采用 rich 中定义样式。
 *         // 这里需要在文本中使用标记符号：
 *         // `{styleName|text content text content}` 标记样式名。
 *         // 注意，换行仍是使用 \n。
 *         formatter: [
 *             {a|这段文本采用样式a},
 *             {b|这段文本采用样式b}这段用默认样式{x|这段用样式x}
 *         ].join(\n),
 *     
 *         rich: {
 *             a: {
 *                 color: red,
 *                 lineHeight: 10
 *             },
 *             b: {
 *                 backgroundColor: {
 *                     image: xxx/xxx.jpg
 *                 },
 *                 height: 40
 *             },
 *             x: {
 *                 fontSize: 18,
 *                 fontFamily: Microsoft YaHei,
 *                 borderColor: #449933,
 *                 borderRadius: 4
 *             },
 *             ...
 *         }
 *     }
 *     
 *     详情参见教程：富文本标签
         * @var AxisLabel\Rich $rich
         */
         public AxisLabel\Rich $rich  ;

  

}