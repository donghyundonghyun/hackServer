<div class="col-md-3">
</div>
<div class="col-md-9">

<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background:#E0E0E0">
                <th style="text-align:center">Num</th>
                <th style="text-align:center">Name</th>
                <th style="text-align:center">Submit</th>
                <th style="text-align:center">My Score</th>
                <th style="text-align:center">Start</th>
                <th style="text-align:center">End</th>
                <th style="text-align:center">Status</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
                $num = 'A';   
				foreach($cps as $cp){      
			?>
                <tr>
                	<td style="text-align:center"> <?=$num++;?> </td>
                	<td style="text-align:center"> <a href="/index.php/judge/contestprobleminfo/<?=$class_id?>/<?=$cp->contestID?>/<?=$cp->ID?>"><?=$cp->problemTitle?> </a> </td>
                    <td style="text-align:center"><?=$submit_cnt[$cp->ID]?></td>
                    <td style="text-align:center">

                <?php if($pass_rates[$cp->ID]*100 <100) {?>
                        <span style="color:red"><?=$pass_rates[$cp->ID]*100?></span>
                <?php }
                      else if($pass_rates[$cp->ID]*100 == 100) {?>
                        <span style="color:green"><?=$pass_rates[$cp->ID]*100?></span>
                    <?php } ?>
                    /100</td>
                    
                <?php
                    if($cp->problemStartTime == '0000-00-00 00:00:00'){
                ?>
                        <td style="text-align:center">Infinite</td>
                <?php
                }
                    else {
                ?>
                        <td style="text-align:center"><?=$cp->problemStartTime?></td>
                <?php
                }
                    if($cp->problemEndTime == '0000-00-00 00:00:00'){
                ?>
                        <td style="text-align:center">Infinite</td>
                <?php
                }
                    else {
                ?>
                        <td style="text-align:center"><?=$cp->problemEndTime?></td>
                <?php
                    }
                ?>

                    <td style="text-align:center"><a href="/index.php/judge/status/<?=$class_id?>/<?=$cp->contestID?>/<?=$cp->ID?>?uid=<?=$this->session->userdata('user_id');?>">Status</a></td>
                </tr>
            
            <?php
        		}
        	?>
        </tbody>
    </table>

</div>
