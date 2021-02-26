<?php
/**
 * @author freegeek
 * php实现任务执行进度条
 */
 
/*php长时间执行的一些小技巧：
1.为了防止超时可将执行时间动态设置为直到执行完才结束(set_time_limit(0))
2.长时间执行有可能会超出默认配置的内存，可动态分配为指定数额，如ini_set('memory_limit','1024M');
3.ob函数库的作用：为了能实时输出每次循环结果必须使用ob函数刷新缓冲区(buff区)，同时这样做程序的韧性也更大，能最大程度上避免因为长时间执行而陷入假死状态
*/


$max=10;
for($i=0;$i<=$max;$i++){
     sleep(1);//实际使用中可去掉，这里使用是为了方便演示进度条
    flush();
   ob_flush();
   flush();
    progress($i,$max,$text='系统处理中，请稍候...');
}


function progress($val,$max,$text=''){
     if($val<2){
     ?>
        <style>

    .progress{
           margin-top:45px;
    	   width:50%;
           position: absolute;
           z-index:1000;
          margin-left:25%;
        }
        .tips-p{
           padding: 3px 8px;
          font-size: 11px;
         background: #eaf7f1;
         border-radius: 4px; 
          color:#7ca491;
         	position: absolute;
        	 margin-left:45%;
        	margin-top:20px;
        }
    </style>
    <?php }
    echo "<div class='tips-p'>$text</div>";
    ?>
   <progress value="<?= $val?>" max="<?= $max ?>" class="progress"></progress>
 <?php
}