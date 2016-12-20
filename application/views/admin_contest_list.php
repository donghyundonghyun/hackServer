<div class="col-md-9">
    <h3 style="text-align:center"><span style="text-transform: uppercase"><?=$name?></span> Management</h3>
</div>
<div class="col-md-9">

    <table class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background:#E0E0E0">
                <th style="text-align:center">Contest</th>
                <th style="text-align:center">edit / delete</th>
                <th style="text-align:center">Available</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
				foreach($contests as $contest){                   
			?>
                <tr>
                    <td style="text-align:center"> <?=$contest->name?> </td>                    
                    <td style="text-align:center">
                        <a href="/index.php/manager/contest_modify_page/<?=$id?>/<?=$contest->ID?>/<?=$mode?>">edit</a> / 
                        <a href="javascript:void(0);" onclick="delete_confirm(<?=$id?>,<?=$contest->ID?>,<?=$mode?>,2);">delete</a> 
                    </td>
                    <td style="text-align:center">
                        <?php if($contest->available == true) { ?>
                              <a style="color:green" href="/index.php/manager/contestReserved/<?=$id?>/<?=$contest->ID?>/<?=$contest->available?>/<?=$mode?>">
                                Available
                              </a>
                        <?php }else{ ?>
                              <a style="color:red" href="/index.php/manager/contestReserved/<?=$id?>/<?=$contest->ID?>/<?=$contest->available?>/<?=$mode?>">
                                Reserved
                              </a>
                        <?php } ?>
                    </td>
                </tr>
            <?php
                }
            ?>
        </tbody>
    </table>
    <div align="right">
        <a href ="/index.php/manager/contest_add_page/<?=$id?>/<?=$mode?>" class="btn btn-default" align="right">Create</a>
    </div>
</div>
