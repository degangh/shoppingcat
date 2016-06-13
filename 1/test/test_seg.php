<?php
$str = "明天星期天";
$seg = new SaeSegment();
$ret = $seg->segment($str, 1);

print_r($ret);  //输出

// 失败时输出错误码和错误信息
if ($ret === false)
        var_dump($seg->errno(), $seg->errmsg());
?>
