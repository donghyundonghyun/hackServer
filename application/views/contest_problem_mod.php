<div class="col-md-3">
</div>
  <form class="col-md-9" name="cpform" action="/index.php/manager/edit_cp/<?=$id?>/<?=$contest_id?>/<?=$cp_info->ID?>/<?=$mode?>"
  		 onsubmit="return addcheck()" method="post">
        <div class="row">
            <div class="form-group col-xs-6">
                <label class="control-label" for="inputName">Problem</label>
                <select disabled id="problem_id" class="form-control" name="problem_id">
                    <option selected><?=$cp_info->problemTitle?></option>
                </select>
            </div>
        </div>
    
        <div class="row">
            <div class="form-group col-xs-6">
              <label class="control-label" for="inputStart">Starting time</label>
                <div style="display:inline-block;">
                    <div class='input-group date' id='datetimepicker6' style="width:80%; float:left">
                        <input id="inputStart" type='text' class="form-control" value="<?=$cp_info->problemStartTime?>" name="start"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <div class="checkbox-inline" style="width:17.5%; text-align:center; margin-left:5px">
                        <label>
                            <input name="startCheck" type="checkbox" <?php if($cp_info->problemStartTime =='0000-00-00 00:00:00') echo 'checked' ?> 
                            	onclick="checkDisable(this.form)"> infinite
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
                        <input id="inputEnd" type='text' class="form-control" value="<?=$cp_info->problemEndTime?>" name="end"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                    <div class="checkbox-inline" style="width:17.5%; text-align:center; margin-left:5px">
                        <label>
                            <input name="endCheck" type="checkbox" <?php if($cp_info->problemEndTime =='0000-00-00 00:00:00') echo 'checked' ?>
                            	onclick="checkDisable(this.form)" > infinite
                        </label>
                    </div>
                </div>
            </div>
        </div>
        

    

    <div>
      <input type="submit" class="btn btn-default" value="OK"/>
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

    function addcheck() {
        if(cpform.problem_id.value == "") {
            alert("Problem is not selected !!!");
            cpform.name.focus();
            return false;
        }else if(!cpform.startCheck.checked && cpform.start.value==""){
             alert("Starting time is null!");
            cpform.start.focus();
            return false;
        }else if(!cpform.endCheck.checked && cpform.end.value==""){
            alert("Ending time is null!");
            cpform.end.focus();
            return false;
        }else if(!cpform.endCheck.checked && cpform.start.value >= cpform.end.value) {
            alert("Ending Time must be later than Starting time ! ! ");
            cpform.start.focus();
            return false;
        }
        else 
            return true;
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
    checkDisable(document.cpform);

</script>