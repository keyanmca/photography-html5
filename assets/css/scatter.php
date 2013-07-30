<?php
    header("Content-type: text/css");
    $count = (int)$_REQUEST['count'];
    
    for($i = 1; $i <= $count; $i++)
    {
        $rotation = rand(-5, 5);
?>
.album li:nth-child(<?=$i?>){
    z-index: <?=$i;?>;
    -webkit-transform: rotate(<?=$rotation;?>deg);
    -moz-transform: rotate(<?=$rotation;?>deg);
}

.album li:hover{
    -webkit-transform: rotate(0deg) scale(1.05, 1.05);
    -moz-transform: rotate(0deg) scale(1.05, 1.05);
}

<?
    }  
   
?>