<div class="col-md-3">
	<div class="well sidebar-nav">
		<ul class="nav nav-list">
			<li class="nav-header" style="font-size:13px"><?=$class_name?></li>
			<?php
			if(!empty($contests)){		
				foreach($contests as $contest) { 
			?>
					<li>
						<a href="/index.php/judge/contestproblemlist/<?=$class_id?>/<?=$contest->ID?>">
							<?=$contest->name?>
						</a>
					</li>
			<?php 			
				}
			}//if
			else{
			?>
				Contest is empty !
			<?php
			}
			?>
		</ul>
	</div>
</div>