<?php
$str = file_get_contents("http://www.guilin.gov.cn/xwgz/201606/t20160614_578770.htm");
$seg = new SaeSegment();
$ret = $seg->segment($str, 1);
echo "<pre>";
print_r($ret);  //输出

// 失败时输出错误码和错误信息
if ($ret === false)
        var_dump($seg->errno(), $seg->errmsg());
?>
