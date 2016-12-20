
	<form class="col-md-9" name="contest_mod" action="/index.php/manager/modify_contest/<?=$id?>/<?=$contest_info->ID?>/<?=$mode?>" onsubmit="return modcheck()"  method="post">
        <div class="row">
            <div class="form-group col-xs-6">
        		<label class="control-label" for="inputName">Name</label>
        		<input id="inputName" class="form-control" type="text" value="<?=$contest_info->name?>" name="name"/>
    		</div>
        </div>
		
        <div class="row">
            <div class="form-group col-xs-6">
            	<label class="control-label" for="inputStart">Starting time</label>
                <div style="display:inline-block;">
                    <div class='input-group date' id='datetimepicker6' style="width:80%; float:left">
                        <input id="inputStart" type='text' class="form-control" value="<?=$contest_info->startTime?>" name="start"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <div class="checkbox-inline" style="width:17.5%; text-align:center; margin-left:5px">
                        <label>
                            <input name="startCheck" type="checkbox" <?php if($contest_info->startTime =='0000-00-00 00:00:00') echo 'checked' ?> onclick="checkDisable(this.form)" > infinite
                        </label>
                    </div>
                </div>
            </div>
        </div>

        
        <div class="row">
            <div class="form-group col-xs-6">
            	<label class="control-label" for="inputEnd">Ending time</label>
                <div style="display:inline-block;">
                    <div class='input-group date' id='datetimepicker7' style="width:80%; float:left">	
                        <input id="inputEnd" type='text' class="form-control" value="<?=$contest_info->endTime?>" name="end"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                    <div class="checkbox-inline" style="width:17.5%; text-align:center; margin-left:5px">
                        <label>
                            <input name="endCheck" type="checkbox" <?php if($contest_info->endTime =='0000-00-00 00:00:00') echo 'checked'?> onclick="checkDisable(this.form)" > infinite
                        </label>
                    </div>
                </div>
            </div>
        </div>	

        <div class="row">
            <div class="form-group col-xs-3">
            <label class="control-label" for="inputEnd">Available Language</label>
                <select multiple="multiple" class="form-control" size="4" name="langmasks[]">
                <?php $mask = $contest_info->langmask;?>
                    <option value="1" <?php if($mask%2 == 1) echo 'selected'; ?> >C</option>
                <?php $mask = $mask/2 ?>
                    <option value="2" <?php if($mask%2 == 1) echo 'selected'; ?> >C++</option>
                <?php $mask = $mask/2 ?>
                    <option value="4" <?php if($mask%2 == 1) echo 'selected'; ?> >Java</option>
                <?php $mask = $mask/2 ?>
                    <option value="8" <?php if($mask%2 == 1) echo 'selected'; ?> >Python2</option>
                <?php $mask = $mask/2 ?>
                    <option value="16" <?php if($mask%2 == 1) echo 'selected'; ?> >Python3</option>
                </select>
            </div>
        </div>

        
        <div class="row">
            <div class="form-group col-xs-6">
            <label class="control-label" for="inputEnd">Mode</label>
                <label class="radio-inline">
                    <input type="radio" name="contestmode" value="0" <?php if($contest_info->exam == false) echo 'checked' ?>> Normal Mode
                </label>
                <label class="radio-inline">
                    <input type="radio" name="contestmode" value="1" <?php if($contest_info->exam == true) echo 'checked' ?>> Exam Mode
                </label>
            </div>
        </div>

		<div>
			<input type="submit" class="btn btn-default" value="Modify"/>
		</div>
	</form> 

        
<script type="text/javascript">
    $(function () {
        $('#datetimepicker6').datetimepicker({
            format:'YYYY-MM-DD HH:mm:ss'
        });
        $('#datetimepicker7').datetimepicker({
            useCurrent: false, //Important! See issue #1075
            format:'YYYY-MM-DD HH:mm:ss'
        });
        $("#datetimepicker6").on("dp.change", function (e) {
            $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
        });
        $("#datetimepicker7").on("dp.change", function (e) {
            $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
        });
    });

    function modcheck() {
	  if(contest_mod.name.value == "") {
	    alert("Contest Name is Empty !!!");
	    contest_mod.name.focus();
	    return false;
	  }
      else if(!contest_mod.startCheck.checked && contest_mod.start.value==""){
        alert("Starting time is null!");
        contest_mod.start.focus();
        return false;
      }else if(!contest_mod.endCheck.checked && contest_mod.end.value==""){
        alert("Ending time is null!");
        contest_mod.end.focus();
        return false;
      }
      else if(!contest_mod.endCheck.checked && contest_mod.start.value >= contest_mod.end.value) {
	  	alert("Ending Time must be later than starting time ! ! ");
	  	contest_mod.start.focus();
	  	return false;
	  }
      else if(contest_mod.contestmode.value==1 && contest_mod.endCheck.checked){
        alert("if you checked exam mode, you must not check infinite at ending time ! ! ");
        return false;
      }
	  
      else return true;
	}

    function checkDisable(form){
        if( form.endCheck.checked == true ){
            form.end.disabled = true;
            form.end.value = "";
        } else {
            form.end.disabled = false;
        }

        if( form.startCheck.checked == true ){
            form.start.disabled = true;
            form.start.value = "";
        } else {
            form.start.disabled = false;        
        }
    }
    checkDisable(document.contest_mod);

</script>