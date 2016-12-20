<div class="col-md-3">
</div>
  <form class="col-md-9" name="cpform" action="/index.php/manager/add_cp/<?=$id?>/<?=$contest_id?>/<?=$mode?>" onsubmit="return addcheck()"  method="post">
        <div class="row">
            <div class="form-group col-xs-6">
                <label class="control-label" for="inputName">Problem</label>
                <select id="problem_id" class="form-control" name="problem_id">
                    <?php 
                        foreach($my_problems as $problem){
                    ?>
                            <option value="<?=$problem->ID?>"><?=$problem->title?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>
        </div>
    
        <div class="row">
            <div class="form-group col-xs-6">
              <label class="control-label" for="inputStart">Starting time</label>
                <div style="display:inline-block;">
                    <div class='input-group date' id='datetimepicker6' style="width:80%; float:left">
                        <input id="inputStart" type='text' class="form-control" value="<?=date("Y-m-d H:i:s",time());?>" name="start"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>
                    <div class="checkbox-inline" style="width:17.5%; text-align:center; margin-left:5px">
                        <label>
                            <input name="startCheck" type="checkbox" onclick="checkDisable(this.form)"> infinite
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
                        <input id="inputEnd" type='text' class="form-control" value="<?=date("Y-m-d H:i:s",time());?>" name="end"/>
                        <span class="input-group-addon">
                            <span class="glyphicon glyphicon-calendar"></span>
                        </span>
                    </div>

                    <div class="checkbox-inline" style="width:17.5%; text-align:center; margin-left:5px">
                        <label>
                            <input name="endCheck" type="checkbox" onclick="checkDisable(this.form)" > infinite
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
            alert("Ending Time must be later than starting time ! ! ");
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

</script>