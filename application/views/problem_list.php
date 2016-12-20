<div class="col-md-9">

<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background:#E0E0E0">
                <th style="text-align:center">Num</th>
                <th style="text-align:center">Name</th>
                <th style="text-align:center">Submit</th>
                <th style="text-align:center">Pass rate</th>
                <th style="text-align:center">Start</th>
                <th style="text-align:center">End</th>
                <th style="text-align:center">Status</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
                $num = 'A';   
				foreach($contest_problems as $contest_problem){      
			?>
                <tr>
                	<td style="text-align:center"> <?=$num++;?> </td>

                    <!-- Controller's getProblemInfo()실행하면서 문제설명 페이지로 이동 -->
                	<td style="text-align:center"> <a href="/index.php/judge/getProblemInfo/<?=$contest_problem->ID?>/<?=$contest_problem->problemID?>"> 
                                <?=$contest_problem->problemTitle?> </a> </td>
                    <td style="text-align:center"><?=$submit_cnt[$contest_problem->ID]?></td>
                    <td style="text-align:center">
                        <?=$pass_rates[$contest_problem->ID]*100?>%</td>
                    
                <?php
                    if($contest_problem->problemStartTime == '0000-00-00 00:00:00'){
                ?>
                        <td style="text-align:center">Infinite</td>
                <?php
                }
                    else {
                ?>
                        <td style="text-align:center"><?=$contest_problem->problemStartTime?></td>
                <?php
                }
                    if($contest_problem->problemEndTime == '0000-00-00 00:00:00'){
                ?>
                        <td style="text-align:center">Infinite</td>
                <?php
                }
                    else {
                ?>
                        <td style="text-align:center"><?=$contest_problem->problemEndTime?></td>
                <?php
                    }
                ?>

                    <td style="text-align:center"><a href="/index.php/judge/status/<?=$contest_problem->ID?>">Status</a></td>
                </tr>
            
            <?php
        		}
        	?>
        </tbody>
    </table>

</div>
