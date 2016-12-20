<div class="col-md-3">
</div>
<div class="col-md-9">

<h3 style="text-align:center">
    <a href="/index.php/manager/contest_score/<?=$id?>/<?=$contest_id?>/<?=$mode?>?sort=0">[Total Score]</a>
    <a href="/index.php/manager/status/<?=$id?>/<?=$contest_id?>/-1/<?=$mode?>">[Status]</a>
</h3>

<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background:#E0E0E0">
                <th style="text-align:center">Num</th>
                <th style="text-align:center">Name</th>
                <th style="text-align:center">Start</th>
                <th style="text-align:center">End</th>
                <th style="text-align:center">Status</th>
                <th style="text-align:center">Score</th>
                <th style="text-align:center">edit / delete</th>
                <th style="text-align:center">Available</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $num = 'A';   
                foreach($cps as $cp){      
            ?>
                <tr>
                    <td style="text-align:center"> <?=$num++;?> </td>
                    <td style="text-align:center"><a href="/index.php/manager/cp_info/<?=$id?>/<?=$cp->contestID?>/<?=$cp->ID?>/<?=$mode?>"><?=$cp->problemTitle?></a></td>
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

                    <td style="text-align:center"><a href="/index.php/manager/status/<?=$id?>/<?=$cp->contestID?>/<?=$cp->ID?>/<?=$mode?>">Status</a></td>
                    <td style="text-align:center"><a href="/index.php/manager/score/<?=$id?>/<?=$cp->contestID?>/<?=$cp->ID?>/<?=$mode?>?sort=0">Score</a></td>
                    <td style="text-align:center">
                        <?php if($mode==CLASSMODE && $iscommon) {?>
                            ----
                        <?php }else{ ?>
                            <a href="/index.php/manager/edit_cp_page/<?=$id?>/<?=$cp->contestID?>/<?=$cp->ID?>/<?=$mode?>">edit</a> / 
                            <a href="javascript:void(0);" onclick="delete_confirm(<?=$id?>,'<?=$contest_id?>/<?=$cp->ID?>',<?=$mode?>, 1);">delete</a>
                        <?php } ?>
                    </td>
                    <td style="text-align:center">
                    <?php if($mode==CLASSMODE && $iscommon) {?>
                            ----
                    <?php }else{ ?>
                        <?php if($cp->available == true) { ?>
                            <a style="color:green" 
                                href="/index.php/manager/cp_available/<?=$id?>/<?=$cp->contestID?>/<?=$cp->ID?>/<?=$cp->available?>/<?=$mode?>">
                                Available
                            </a>
                        <?php }else{ ?>
                            <a style="color:red" 
                                href="/index.php/manager/cp_available/<?=$id?>/<?=$cp->contestID?>/<?=$cp->ID?>/<?=$cp->available?>/<?=$mode?>">
                                Reserved
                            </a>
                        <?php }
                        } ?>
                    </td>
                </tr>
            
            <?php
                }
            ?>
        </tbody>
    </table>
    <?php if(!$iscommon || $mode==SUBJECTMODE) {?>
        <div align="right">
            <a href ="/index.php/manager/add_cp_page/<?=$id?>/<?=$contest_id?>/<?=$mode?>" class="btn btn-default" align="right">Add Problem</a>
        </div>
    <?php } ?>
</div>
