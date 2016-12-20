<div class="col-md-3">
</div>
<div class="col-md-9">
	<form name="rej" class="col-md-9" action="/index.php/manager/rejudge/<?=$id?>/<?=$mode?>/0" onsubmit="return emptycheck(0);" method="post">
		<div class="form-group col-xs-7">
			<label class="control-label" for="inputTitle">Problem ID</label>
			<input id="inputTitle" class="form-control" type="text" placeholder="problem ID" name="pid" />
		</div>	
		<div class="form-group col-xs-6">
			<div class="input-group">
				<input type="submit" class="btn btn-default" value="확인" />
			</div>
		</div>
	</form> 

	<form name="new" class="col-md-9" action="/index.php/manager/rejudge/<?=$id?>/<?=$mode?>/1" onsubmit="return emptycheck(1);" method="post">
		<div class="form-group col-xs-7">
			<label class="control-label" for="inputTitle">Submission ID</label>
			<input id="inputTitle" class="form-control" type="text" placeholder="Submission ID" name="sid" />
		</div>	
		<div class="form-group col-xs-6">
			<div class="input-group">
				<input type="submit" class="btn btn-default" value="확인" />
			</div>
		</div>
	</form> 
</div>

<script>
function emptycheck(mode) {
	if(mode == 0){
		if(document.rej.pid.value == "") {
			alert("Input problem id...");
			return false;
		}
		else return true;
	}else{
		if(document.rej.sid.value == "") {
			alert("Input submission id...");
			return false;
		}
		else return true;
	}
}
</script>
