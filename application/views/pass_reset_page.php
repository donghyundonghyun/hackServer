  <div class="col-md-3"></div>

  <div class="col-md-9">
    <form name="mypage" class="form-horizontal" action="/index.php/manager/reset/<?=$id?>/<?=$mode?>" onsubmit="return resetcheck()" method="post">
      <div class="form-group">
        <label class="col-sm-4 control-label" for="id">Student ID</label>
        <div class="col-sm-5">
          <input type="text" id="id" name="id" class="form-control input-sm" placeholder="Student ID">
        </div>
      </div>
      
      <div class="form-group">
        <label class="col-sm-4 control-label" for="password">New Password</label>
        <div class="col-sm-5">
          <input type="password" id="newpassword" name="newpassword" class="form-control input-sm" value="" placeholder="password">
        </div>
      </div>      
      
      <div class="form-group">
        <label class="col-sm-4 control-label"></label>
        <div class="col-sm-5">
          <input type="submit" class="btn btn-primary" class="form-control input-sm" value="RESET" />
        </div>
      </div>      
    
    </form>  
  </div>


<script type="text/javascript">
  
  function resetcheck() {
    if(id.value == "" || newpassword.value==""){
      alert("fill the empty field !");
      return false;
    }
    return true;
  }

</script>