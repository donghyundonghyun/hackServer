
<div class="col-md-9">
    <table id="scoreTable" class="table table-striped table-bordered table-hover">
        <caption><h1 style="text-align:center"><small>Exam Management</small></h1></caption>
        <thead>
            <tr style="background:#E0E0E0">                
                <th style="vertical-align:middle; text-align:center">Exam Name</th>
                <th style="vertical-align:middle; text-align:center">User ID</th>
                <th style="vertical-align:middle; text-align:center">IP Address</th>
                <th style="vertical-align:middle; text-align:center">Starting Time</th>
                <th style="vertical-align:middle; text-align:center">Exam Stop</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
				foreach($data as $entry){
			?>
                <tr>                	
                	<td style="vertical-align:middle; text-align:center"><?=$entry->name?></td>
                	<td style="vertical-align:middle; text-align:center"><?=$entry->user_id?></td>
                	<td style="vertical-align:middle; text-align:center"><?=$entry->ip_address?></td>
                	<td style="vertical-align:middle; text-align:center"><?=$entry->start_time?></td>
                    <td style="vertical-align:middle; text-align:center">
                        <a href="javascript:void(0);" onclick="delete_confirm(<?=$id?>,'<?=$entry->user_id?>/<?=$entry->ip_address?>',<?=$mode?>, 3);">STOP</a>
                    </td>
                </tr>
            
            <?php
        		}
        	?>
        </tbody>
    </table>

</div>
