
	<form class="col-md-9" name="contest_mod" action="/index.php/manager/student_manage/<?=$id?>/<?=$mode?>" method="post">
        <div class="row"> 
              <div class="form-group col-xs-6">
                  <label class="control-label" for="inputStudent">Student</label>
                  <textarea class="form-control" id="inputStudent" name="student" rows="15"><?php
                      foreach($students as $std){
                        echo $std->userID."\n";
                      }
                      ?></textarea>
              </div>
          </div>

		<div>
			<input type="submit" class="btn btn-default" value="Modify"/>
		</div>
	</form> 