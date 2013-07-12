
<?php
    function some_other_func($a, $b)
    {
        $param = func_get_args();
        $param = join(", ", $param);    // 分解显示

        echo "the arglist is: $param\n";
    }
    some_other_func(1,3,5,7,9);
?>