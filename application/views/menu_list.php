<div class="col-md-3">
	<div class="well sidebar-nav">
		<ul class="nav nav-list">
			<li class="nav-header" style="font-size:13px">Management</li>
				<li><a href="/index.php/manager/problem/<?=$id?>/<?=$mode?>">Problem Management</a></li>
				<?php if($mode != SUBJECTMODE){ ?>
					<li><a href="/index.php/manager/std/<?=$id?>/<?=$mode?>">Student Management</a></li>
				<?php } ?>
					<li><a href="/index.php/manager/exam_manage/<?=$id?>/<?=$mode?>">Exam Management</a></li>
				<?php if($mode == SUBJECTMODE){?>
					<li><a href="/index.php/manager/rejudgepage/<?=$id?>/<?=$mode?>">Rejudge</a></li>
					<li><a href="/index.php/manager/pass_reset_page/<?=$id?>/<?=$mode?>">Password reset</a></li>
				<?php } ?>
		</ul>
	</div>

	<div class="well sidebar-nav">
		<ul class="nav nav-list">
			<li class="nav-header" style="font-size:13px"><?=$name?> <span><a style="color:red;" href="/index.php/manager/contest/<?=$id?>/<?=$mode?>"><i class="glyphicon glyphicon-edit"></i></a></span></li>
			<?php
			if(!empty($contests)){		
				foreach($contests as $contest) { 
			?>
					<li>
						<a href="/index.php/manager/cp/<?=$id?>/<?=$contest->ID?>/<?=$mode?>"><?=$contest->name?></a>
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




