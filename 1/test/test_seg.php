<?php
$str = "2016年6月13日，国家主席习近平致电美国总统奥巴马，就美国佛罗里达州奥兰多市发生枪击事件造成重大人员伤亡，代表中国政府和人民，向奥巴马总统、美国政府和人民表示深切的同情和诚挚的慰问，并向遇难者表示沉痛的哀悼。";
$seg = new SaeSegment();
$ret = $seg->segment($str, 1);

print_r($ret);  //输出

// 失败时输出错误码和错误信息
if ($ret === false)
        var_dump($seg->errno(), $seg->errmsg());
?>
