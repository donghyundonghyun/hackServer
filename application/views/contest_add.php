
  <form class="col-md-9" name="contest_mod" action="/index.php/manager/contest_add/<?=$id?>/<?=$mode?>" onsubmit="return addcheck()"  method="post">
        <div class="row">
            <div class="form-group col-xs-6">
            <label class="control-label" for="inputName">Name</label>
            <input id="inputName" class="form-control" type="text" name="name"/>
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
                            <input name="startCheck" type="checkbox" onclick="checkDisable(this.form)">infinite
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
                            <input name="endCheck" type="checkbox" onclick="checkDisable(this.form)" >infinite
                        </label>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="row">
            <div class="form-group col-xs-3">
            <label class="control-label" for="inputEnd">Available Language</label>
                <select multiple="multiple" class="form-control" size="4" name="langmasks[]">
                    <option value="1">C</option>
                    <option value="2">C++</option>
                    <option value="4">Java</option>
                    <option value="8">Python2</option>
                    <option value="16">Python3</option>
                </select>
            </div>
        </div>


        <div class="row">
            <div class="form-group col-xs-6">
            <label class="control-label" for="inputEnd">Mode</label>
                <label class="radio-inline">
                  <input type="radio" name="contestmode" value="0" checked> Normal Mode
                </label>
                <label class="radio-inline">
                  <input type="radio" name="contestmode" value="1"> Exam Mode
                </label>
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
    if(contest_mod.name.value == "") {
      alert("Contest Name is Empty !!!");
      contest_mod.name.focus();
      return false;
    }
    else if(!contest_mod.startCheck.checked && contest_mod.start.value==""){
        alert("Start time is null!");
        contest_mod.start.focus();
        return false;
    }else if(!contest_mod.endCheck.checked && contest_mod.end.value==""){
        alert("End time is null!");
        contest_mod.end.focus();
        return false;
    }
  
    else if(!contest_mod.endCheck.checked && contest_mod.start.value >= contest_mod.end.value) {
        alert("End Time must be later than start time ! ! ");
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

</script>