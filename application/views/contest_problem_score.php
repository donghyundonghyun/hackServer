
<div class="col-md-9">
    <table id="scoreTable" class="table table-striped table-bordered table-hover">
        <caption><h1 style="text-align:center"><small><?=$problem_name?></small></h1></caption>
        <thead>
            <tr style="background:#E0E0E0">   
                <th style="vertical-align:middle; text-align:center">Num</th>
                <th style="vertical-align:middle; text-align:center">User ID 
                    <a style="color:black;" href="/index.php/manager/score/<?=$id?>/<?=$contest_id?>/<?=$cp_id?>/<?=$mode?>?sort=0"><i class="glyphicon glyphicon-sort-by-attributes"></i></a>
                </th>
                <th style="vertical-align:middle; text-align:center">Result</th>
                <th style="vertical-align:middle; text-align:center">Score
                    <a style="color:black;" href="/index.php/manager/score/<?=$id?>/<?=$contest_id?>/<?=$cp_id?>/<?=$mode?>?sort=1"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i></a>
                </th>
                <th style="vertical-align:middle; text-align:center">Highest Code</th>
                <th style="vertical-align:middle; text-align:center">Last Code</th>
                <th style="vertical-align:middle; text-align:center">All Codes</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
                $num = 1;
				foreach($students as $entry){
			?>
                <tr>
                    <td style="vertical-align:middle; text-align:center"> <?=$num++?></td>                	
                	<td style="vertical-align:middle; text-align:center"> <?=$entry->userID?> </td>
                	<td style="vertical-align:middle; text-align:center"> 
                        <?php 
                            if(!isset($entry->result)){
                                $btncl ='<span style="color:red">unsubmission</span>';
                            }
                            else if($entry->result==2){
                                $res = 'Accept';
                                $btncl = '<btn class="btn btn-success btn-sm">'.$res.'</btn>';
                            }else if($entry->result==3){
                                $res = 'Wrong Answer';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==4){
                                $res = 'Time Limit';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==5){
                                $res = 'Memory Limit';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==6){
				                $res ='Compile Error';
				                $btncl = '<a href=" /index.php/manager/error/'.$id.'/'.$entry->C_P_ID.'/'.$entry->submission_id.'/'.$mode.' " class="btn btn-danger btn-sm">'.$res.'</a>';
                            }else if($entry->result==8){
                                $res = 'Output Limit';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==9){
				                $res='Run-Time Error';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
			                }else if($entry->result==10){
                                $res = 'Presentation Error';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==11){
                                $res = 'Empty Test-data';
                                $btncl = '<btn class="btn btn-info btn-sm">'.$res.'</btn>';
                            }
				        ?>
                        <?=$btncl?>
                    </td>
                	<td style="vertical-align:middle; text-align:center"><?php
                        if(!isset($entry->result)){ ?>
                            <span style="color:red"> - </span>
                <?php   }else if($entry->pass_rate*100 <100) {?>
                            <span style="color:red"><?=$entry->pass_rate*100?></span>
                <?php   }else if($entry->pass_rate*100 == 100) {?>
                            <span style="color:green"><?=$entry->pass_rate*100?></span>
                    <?php } ?>
                    /100  </td>
                	<td style="vertical-align:middle; text-align:center"> 
                    <?php if(!isset($entry->result)) { ?>
                        -
                    <?php }else{ ?>
                        <a href="/index.php/manager/showsource/<?=$id?>/<?=$entry->C_P_ID?>/<?=$entry->submission_id?>/<?=$mode?>">Highest Code</a>
                    <?php } ?>
                    </td>
                    <td style="vertical-align:middle; text-align:center"> 
                    <?php if(!isset($entry->result)) { ?>
                        -
                    <?php }else{ ?>
                        <a href="/index.php/manager/showsource/<?=$id?>/<?=$entry->C_P_ID?>/<?=$entry->lastSubmission_id?>/<?=$mode?>">Last Code</a>
                    <?php } ?>
                    </td>
                    <td style="vertical-align:middle; text-align:center"> 
                    <?php if(!isset($entry->result)) { ?>
                        -
                    <?php }else{ ?>
                        <a href="/index.php/manager/status/<?=$id?>/<?=$contest_id?>/<?=$entry->C_P_ID?>/<?=$mode?>?uid=<?=$entry->userID?>&result=0&lang=0"> All codes </a>
                    <?php }?>
                    </td>
                </tr>
            
            <?php
        		}
        	?>
        </tbody>
    </table>

</div>
