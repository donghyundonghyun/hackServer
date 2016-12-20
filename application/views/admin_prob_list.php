<div class="col-md-3"></div>
<div class="col-md-9">
    <h3 style="text-align:center">Problem Management</h3>
</div>

<div class="col-md-9">
	
<table class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background:#E0E0E0">
                <th style="text-align:center">Problem ID</th>
                <th style="text-align:center">Problem Title</th>
                <th style="text-align:center">Test Status</th>
                <th style="text-align:center">edit / delete / Test-data</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
			foreach($data['problems'] as $problem){
			?>
                <tr>
                	<td style="text-align:center"> <?=$problem->ID?> </td>
                  	<td style="text-align:center"> <a href="/index.php/manager/prob_test/<?=$id?>/<?=$problem->ID?>/<?=$mode?>"><?=$problem->title?></a> </td>
                    <td style="text-align:center"> <a href="/index.php/manager/teststatus/<?=$id?>/<?=$problem->ID?>/<?=$mode?>">Status</a> </td>
                    <td style="text-align:center">
                        <a href="/index.php/manager/edit_problem_page/<?=$id?>/<?=$problem->ID?>/<?=$mode?>">edit</a> / 
                        <a href="javascript:void(0);" onclick="delete_confirm(<?=$id?>,<?=$problem->ID?>,<?=$mode?>,0);">delete</a> / 
                         <a href="/index.php/manager/testcase_page/<?=$id?>/<?=$problem->ID?>/<?=$mode?>"> Test-data</a> 
                    </td>
                </tr>
        <?php
            }
        ?>
            
        </tbody>
    </table>
        <div align="right">
        <a href ="/index.php/manager/add_problem_page/<?=$id?>/<?=$mode?>" class="btn btn-default" align="right">Create Problem</a>
    </div>
    <div class="row">
        <div class="col-md-12 text-center">
            <?php echo $data['pagination']; ?>
        </div>
    </div>


</div>
