<div class="col-md-4">
    <form name="testcase" method="post" enctype="multipart/form-data">
        <label class="control-label" for="list">Test-data list</label>
        <select multiple="multiple" class="form-control" id="list" size="15" name="testcases[]">
            <?php 
            foreach($cases as $case) {
            ?>
            <option value="<?=$case?>"><?=$case?></option>

            <?php } ?>
        </select>
        <br />
        <input class="btn btn-primary" type="button" onclick="multi_submit(0,<?=$id?>,<?=$problem_id?>,<?=$mode?>);" value="Download selected items">
        <input class="btn btn-danger" type="button" onclick="multi_submit(1,<?=$id?>,<?=$problem_id?>,<?=$mode?>);" value="Delete selected items">
        <br /><br /><br /><br /><br />
        
        <label class="control-label" for="inputTestcase">Test-data add</label>
        <input multiple="multiple" type="file" id="inputTestcase" name="upload_files[]" class="file"/>
        <br />
        <input class="btn btn-primary" type="button" onclick="multi_submit(2,<?=$id?>,<?=$problem_id?>,<?=$mode?>);" value="Add testdata">
    </form>

</div>

