<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="UTF-8"/>
    <title>amis demo</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, maximum-scale=1"
    />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <link rel="stylesheet" href="/amis.3.6.3/sdk.css"/>
    <link rel="stylesheet" href="/amis.3.6.3/helper.css"/>
    <link rel="stylesheet" href="/amis.3.6.3/iconfont.css"/>
    <!-- 这是默认主题所需的，如果是其他主题则不需要 -->
    <!-- 从 1.1.0 开始 sdk.css 将不支持 IE 11，如果要支持 IE11 请引用这个 css，并把前面那个删了 -->
    <!-- <link rel="stylesheet" href="sdk-ie11.css" /> -->
    <!-- 不过 amis 开发团队几乎没测试过 IE 11 下的效果，所以可能有细节功能用不了，如果发现请报 issue -->
    <style>
        html,
        body,
        .app-wrapper {
            position: relative;
            width: 100%;
            height: 100%;
            margin: 0;
            padding: 0;
        }
    </style>
</head>
<body>

<div id="root" class="app-wrapper">

</div>
<script src="/amis.3.6.3/sdk.js"></script>
{{--<script src="https://unpkg.com/amis@3.6.3/sdk/sdk.js"></script>--}}

<script type="text/javascript">
    (function () {
        let amis = amisRequire('amis/embed');
        // 通过替换下面这个配置来生成不同页面
        let amisJSONString = `{!! $amisjstring !!}`

        console.log('amisJSONString',amisJSONString);

        let amisJSON = JSON.parse(amisJSONString);
        console.log('amisJSON',amisJSON);
        let amisScoped = amis.embed('#root', amisJSON);
    })();
</script>
</body>
</html>
