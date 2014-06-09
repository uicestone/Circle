<?php global $is_mobile; $is_mobile = true ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <title>缘点彩色珠宝</title>
    <?php wp_head(); ?>
    <script>
        var startTime = +new Date;
        (function() {
            var isAndroid = navigator.userAgent.toLowerCase().indexOf("android") > -1;
            if (isAndroid) {
                $("html").addClass("android");
            }
        })();
         //- $(window).on("load",function(){
         //-     alert("加载耗时" +  (+new Date - startTime) / 1000  + "s")
         //- });
    </script>
</head>

<body <?php body_class($class); ?>>
