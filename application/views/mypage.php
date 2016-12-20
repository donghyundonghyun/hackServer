<div>  
  <div class="col-md-2"></div>
  <div class="col-md-8">
    <form name="mypage" class="form-horizontal" action="/index.php/auth/modify_myinfo" onsubmit="return mypagecheck()" method="post">

      <div class="form-group">
        <label class="col-sm-4 control-label" for="id">Student ID</label>
        <div class="col-sm-5">
          <input type="text" id="id" name="id" class="form-control input-sm" value="<?=$user_id?>" placeholder="Student ID" disabled>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label" for="password">Password</label>
        <div class="col-sm-5">
          <input type="password" id="password" name="password" class="form-control input-sm" value="" placeholder="password">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label" for="password">New Password</label>
        <div class="col-sm-5">
          <input type="password" id="newpassword" name="newpassword" class="form-control input-sm" value="" placeholder="password">
        </div>
      </div>      
      <div class="form-group">
        <label class="col-sm-4 control-label" for="re_password">Re-type New Password</label>
        <div class="col-sm-5">
        <input type="password" id="new_re_password" name="new_re_password" class="form-control input-sm" value="" placeholder="re-pass">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label" for="name">Name</label>
        <div class="col-sm-5">
          <input type="text" id="name" name="name" class="form-control input-sm" value="<?=$user_info->name?>" placeholder="name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label" for="email">Email</label>
        <div class="col-sm-5">
          <input type="text" id="email" name="email" class="form-control input-sm" value="<?=$user_info->email?>" placeholder="Email">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-4 control-label"></label>
        <div class="col-sm-5">
          <input type="submit" class="btn btn-primary" class="form-control input-sm" value="Modify" />
        </div>
      </div>      
    </form>  
  </div>
   <div class="col-md-2" ></div>
</div>

<script type="text/javascript">
  
  function mypagecheck() {
    if(password.value == "" || newpassword.value=="" || new_re_password.value == "" || name.value=="" || email.value==""){
      alert("fill the empty field !");
      return false;
    }
    else if(newpassword.value != new_re_password.value){
      alert("Passwords do not match");
      return false;
    }
    return true;
  }

</script>