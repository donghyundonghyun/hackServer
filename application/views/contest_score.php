
<div class="col-md-9">
    <table id="scoreTable" class="table table-striped table-bordered table-hover">
        <!-- <caption><h1 style="text-align:center"><small><?=$contest_name?></small></h1></caption> -->
        <thead>
            <tr style="background:#E0E0E0">   
                <th style="vertical-align:middle; text-align:center">Num</th>
                <th style="vertical-align:middle; text-align:center">User ID 
                    <a style="color:black;" href="/index.php/manager/contest_score/<?=$id?>/<?=$contest_id?>/<?=$mode?>?sort=0"><i class="glyphicon glyphicon-sort-by-attributes"></i></a>
                </th>
                <th style="vertical-align:middle; text-align:center">Total
                    <a style="color:black;" href="/index.php/manager/contest_score/<?=$id?>/<?=$contest_id?>/<?=$mode?>?sort=1"><i class="glyphicon glyphicon-sort-by-attributes-alt"></i></a>
                </th>
                <?php
                    $abc = 'A';
                    foreach($cps as $cp){
                ?>
                    <th style="vertical-align:middle; text-align:center">
                        <a style="color:black;" href="/index.php/manager/score/<?=$id?>/<?=$contest_id?>/<?=$cp->ID?>/<?=$mode?>?sort=0"><?=$abc++?></a>
                    </th>
                <?php
                    }
                ?>
            </tr>
        </thead>
        <tbody>
            <?php 
                $num = 1;
                foreach($students as $std){
            ?>
                <tr>
                    <td style="vertical-align:middle; text-align:center"> <?=$num++?></td>                  
                    <td style="vertical-align:middle; text-align:center"> <?=$std[0]->userID?> </td>
                    <!--<td style="vertical-align:middle; text-align:center"> <?=$total[$num-2]*100?> </td>-->
                    <td style="vertical-align:middle; text-align:center"> <?=$std[0]->total*100?> </td>
                    
                    <?php
                        for($i=0;$i<count($cps);$i++){
                    ?>
                        <td style="vertical-align:middle; text-align:center"> 
                            <?php 
                                if(!isset($std[$i]->result)){
                                    $btncl ='<span style="color:red"> - </span>';
                                }   
                                else if($std[$i]->result==2){
                                    //$btncl = '<btn class="btn btn-success btn-sm">'.($std[$i]->pass_rate)*100.' / 100</btn>';
                                    $btncl = '<btn class="btn btn-success btn-sm">'.($std[$i]->pass_rate*100).' / 100</btn>';
                                }
                                else {
                                    $btncl = '<btn class="btn btn-danger btn-sm">'.($std[$i]->pass_rate*100).' / 100</btn>';
                                    //$btncl = "test";
                                }
                                
                            ?>
                            <?=$btncl?>
                        </td>
                    <?php 
                        }
                    ?>

                </tr>
            
            <?php
                }
            ?>
        </tbody>
    </table>

</div>
