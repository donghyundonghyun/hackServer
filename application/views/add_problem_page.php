<div class="col-md-3">
</div>
<div class="col-md-9">
<?php 
	if($problem_id==-1){
?>
		<form name="new" class="col-md-9" action="/index.php/manager/add_problem/<?=$id?>/<?=$mode?>" method="post">
<?php 
	}else{ 
?>
		<form name="edit" class="col-md-9" action="/index.php/manager/edit_problem/<?=$id?>/<?=$problem_id?>/<?=$mode?>" method="post">
<?php 
	}
?>
			<div class="form-group col-xs-12">
				<label class="control-label" for="inputTitle">Problem title</label>
				<input id="inputTitle" class="form-control" type="text" placeholder="problem title" name="title" value="<?=$probInfo->title?>"/>
			</div>

			<div class="form-group col-xs-12">
				<label class="control-label" for="inputDescription">Problem description</label>
				<textarea id="inputDescription" placeholder="Problem description" class="form-control" rows="15" name="description"><?=$probInfo->description?></textarea>
			</div>
			<div class="form-group col-xs-6">
				<label for="inputTime">Time limit</label>
				<div class="input-group">
					<input class="form-control" id="inputTime" type="number" value="<?=$probInfo->time_limit?>" name="time"/>
					<span class="input-group-addon">ms</span>
				</div>
			</div>
			<div class="form-group col-xs-6">
				<label for="inputMemory">Memory limit</label>
				<div class="input-group">
					<input class="form-control" id="inputTitle" type="number" value="<?=$probInfo->memory_limit?>" name="memory"/>
					<span class="input-group-addon">MB</span>
				</div>
			</div>
			<div class="form-group col-xs-6">
				<div class="input-group">
					<input type="button" class="btn btn-default" value="확인" onclick="erchk(<?=$problem_id?>)"/>
				</div>
			</div>
		
		</form> 
</div>


<script>
function erchk(problem_id) {
	if (document.getElementById("inputTitle").value == "" || document.getElementById("inputDescription").value == "" ) {
		alert("Title or Description is Empty !!!");
		return false;
	}else{
		if(problem_id=="-1")
			document.new.submit();
		else{
			document.edit.submit();
		}
	}
}
</script>

