<div class="col-md-3" >
</div>
<div class="col-md-6">
	<h3 style="text-align:center"> <a href="/index.php/judge/download_manual" id="ManualDownload">[ Manual Download ]</a> </h3>

	<div class="list-group">

<?php 
	if(!empty($belong['public'])){
?>
	  <a class="list-group-item active">Public Class</a>
	  <?php 
	  foreach($belong['public'] as $entry){
	  ?>
	  	<a href="/index.php/judge/studentmain/<?=$entry->ID?>" class="list-group-item"><?=$entry->className?></a>
	  <?php
	  }
	}
?>


<?php 
	if(!empty($belong['student'])){
?>
	  <a class="list-group-item active">My Class</a>
	  <?php 
	  foreach($belong['student'] as $entry){
	  ?>
	  	<a href="/index.php/judge/studentmain/<?=$entry->ID?>" class="list-group-item"><?=$entry->className?></a>
	  <?php
	  }
	}
	  ?>


<?php 
	  if(!empty($belong['classM'])){
?>
	  	<a class="list-group-item active">Class Management</a>
<?php 
	  	foreach($belong['classM'] as $entry){
	  ?>
	  		<a href="/index.php/manager/mainpage/<?=$entry->ID?>/0" class="list-group-item"><?=$entry->className?></a>
<?php
	  	}
	  }
?>


<?php
	if(!empty($belong['subjectM'])){
?>
	  <a class="list-group-item active">Subject Management</a>
<?php 
	  foreach($belong['subjectM'] as $entry){
?>
	  	<a href="/index.php/manager/mainpage/<?=$entry->ID?>/1" class="list-group-item"><?=$entry->subjectName?></a>
<?php
	  }
	}
?>
	</div>
</div>
<div class="col-md-3" >
</div>
