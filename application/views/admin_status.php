<div class="col-md-3">
</div>
<div class="col-md-9">

<div style="vertical-align:middle; text-align:center">
    <form class="form-inline" method="get" action="/index.php/manager/status/<?=$id?>/<?=$contest_id?>/<?=$this->uri->segment(5)?>/<?=$mode?>">
        <div class="form-group">
            <label for="uid">User ID : </label>        
            <input id="uid" type="text" class="form-control input-sm" name="uid" placeholder="User ID" value="<?=$post['uid']?>" />
        </div>
        &nbsp;
        <div class="form-group">
            <label for="res">Result : </label>        
            <select id="res" name="result" class="form-control input-sm">
                <option value="0" <?= $post['result']==0?'selected':'' ?>> ALL </option>
                <option value="1" <?= $post['result']==1?'selected':'' ?>> Pending </option>
                <option value="2" <?= $post['result']==2?'selected':'' ?>> Accept </option>
                <option value="3" <?= $post['result']==3?'selected':'' ?>> Wrong Answer </option>
                <option value="4" <?= $post['result']==4?'selected':'' ?>> Time Limit </option>
                <option value="5" <?= $post['result']==5?'selected':'' ?>> Memory Limit </option>
                <option value="6" <?= $post['result']==6?'selected':'' ?>> Compile Error</option>
                <option value="8" <?= $post['result']==8?'selected':'' ?>> Output Limit</option>
                <option value="9" <?= $post['result']==9?'selected':'' ?>> Run-time Error</option>
                <option value="10" <?= $post['result']==10?'selected':'' ?>> Presentation Error</option>
                <option value="11" <?= $post['result']==11?'selected':'' ?>> Empty Test-data</option>
            </select>
        </div>
        &nbsp;
        <div class="form-group">
            <label for="lang">language : </label>
            <select id="lang" name="lang" class="form-control input-sm">
                <option value="0" <?= $post['lang']==0?'selected':'' ?>> ALL </option>
                <option value="1" <?= $post['lang']==1?'selected':'' ?>> C </option>
                <option value="2" <?= $post['lang']==2?'selected':'' ?>> C++ </option>
                <option value="3" <?= $post['lang']==3?'selected':'' ?>> Java </option>
                <option value="4" <?= $post['lang']==4?'selected':'' ?>> Python2 </option>
                <option value="4" <?= $post['lang']==5?'selected':'' ?>> Python3 </option>
            </select>
        </div>
        &nbsp;
        <input type="submit" class="btn btn-default" value="search" />
        
    </form> 
</div>
	<br/>
    <table id="result-tab" class="table table-striped table-bordered table-hover">
        <thead>
            <tr style="background:#E0E0E0">
                <th style="vertical-align:middle; text-align:center">Submission ID</th>
                
                <th style="vertical-align:middle; text-align:center">User ID</th>
                <th style="vertical-align:middle; text-align:center">Result</th>
                <th style="vertical-align:middle; text-align:center">Score</th>
                <th style="vertical-align:middle; text-align:center">Code</th>
                <th style="vertical-align:middle; text-align:center">time</th>
                <th style="vertical-align:middle; text-align:center">Memory</th>
                <th style="vertical-align:middle; text-align:center">Submission Time</th>
            </tr>
        </thead>
        <tbody>
        	<?php 
				foreach($data['list'] as $entry){                   
			?>

                <tr>
                	<td style="vertical-align:middle; text-align:center"> <?=$entry->ID?> </td>
                	
                	<td style="vertical-align:middle; text-align:center"> <?=$entry->userID?> </td>
                	<td style="vertical-align:middle; text-align:center; color:#e67e22;"> 
                        <?php if($entry->result==1){
                               $btncl = 'Judging '.round($entry->progress_rate*100).'% <img width="30" src="/static/img/loading_spinner.gif">';
                            }else if($entry->result==2){
                                $res = 'Accept';
                                $btncl = '<btn class="btn btn-success btn-sm">'.$res.'</btn>';
                            }else if($entry->result==3){
                                $res = 'Wrong Answer';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==4){
                                $res = 'Time Limit';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==5){
                                $res = 'Memory Limit';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==6){
				                $res ='Compile Error';
                                $btncl = '<a href=" /index.php/manager/error/'.$id.'/'.$entry->C_P_ID.'/'.$entry->ID.'/'.$mode.' " class="btn btn-danger btn-sm">'.$res.'</a>';
                            }else if($entry->result==8){
                                $res = 'Output Limit';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==9){
				                $res = 'Run-Time Error';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
			                }else if($entry->result==10){
                                $res = 'Presentation Error';
                                $btncl = '<btn class="btn btn-danger btn-sm">'.$res.'</btn>';
                            }else if($entry->result==11){
                                $res = 'Empty Test-data';
                                $btncl = '<btn class="btn btn-info btn-sm">'.$res.'</btn>';
                            }
				        ?>
                        <?=$btncl?>
                    </td>
                	<td style="vertical-align:middle; text-align:center"> <?php
                        if($entry->pass_rate*100 ==0 && $entry->result==1)
                            echo $entry->pass_rate*100;
                        else if($entry->pass_rate*100 <100) {?>
                            <span style="color:red"><?=$entry->pass_rate*100?></span>
                <?php  }else if($entry->pass_rate*100 == 100) {?>
                            <span style="color:green"><?=$entry->pass_rate*100?></span>
                    <?php } ?>
                    /100 </td>
                	<td style="vertical-align:middle; text-align:center"> 
                        
                        <a href="/index.php/manager/showsource/<?=$id?>/<?=$entry->C_P_ID?>/<?=$entry->ID?>/<?=$mode?>">
                        <?php if($entry->language==1){
                                $lang = 'C'; 
                            }else if($entry->language==2){
                                $lang = 'C++';
                            }else if($entry->language==3){
                                $lang = 'Java';
                            }else if($entry->language==4){
                                $lang = 'Python2';
                            }else if($entry->language==5){
                                $lang = 'Python3';
                            }
                            ?>
                            <?=$lang?>                       
                        </a> / 
                        <a href="/index.php/manager/submitpage/<?=$id?>/<?=$contest_id?>/<?=$entry->C_P_ID?>/<?=$mode?>?sid=<?=$entry->ID?>">edit</a>
                    </td>
                    <td style="vertical-align:middle; text-align:center"> <?=$entry->running_time?><span style="color:red"> ms</span> </td>
                    <td style="vertical-align:middle; text-align:center"> <?=$entry->memory?><span style="color:red"> KB</span> </td>
                	<td style="vertical-align:middle; text-align:center"> <?=$entry->submission_time?> </td>
                </tr>
            
            <?php
        		}
        	?>
        </tbody>
    </table>

        <div class="row">
            <div class="col-md-12 text-center">
                <?php echo $data['pagination']; ?>
            </div>
        </div>


</div>


<script type="text/javascript">

    var prog_rate = [<?php
                    foreach($data['list'] as $entry){
                        echo "'$entry->progress_rate',";
                    }?>''];
    
    var sidarr = [<?php
                    foreach($data['list'] as $entry){
                        echo "'$entry->ID',";
                    }?>''];

    var tb = window.document.getElementById('result-tab');
    var rows=tb.rows;

    function auto_refresh(){    
       // alert(rows.length);
        for(var i=1; i<rows.length;i++){
            if(prog_rate[i-1] != 1){
                fresh_result(i);
            }
        }
    }
    auto_refresh();

    function fresh_result(i){
        $.ajax({
            url:"/index.php/judge/refresh/"+sidarr[i-1],
            dataType:'json',
            cache: false,
            crossDomain: true,
            contentType: 'application/json; charset=utf-8',
            success:function(data){
                if(data.result == 1){
                    rows[i].cells[2].innerHTML = "Judging ("+Math.round(data.progress_rate*100)+"%) <img width='30' src='/static/img/loading_spinner.gif'>";
                    window.setTimeout("fresh_result("+i+")",300);
                }else{
                    if(data.result == 2)
                        rows[i].cells[2].innerHTML = "<btn class='btn btn-success btn-sm'>Accept</btn>";
                    
                    else if(data.result == 3)
                        rows[i].cells[2].innerHTML = "<btn class='btn btn-danger btn-sm'>Wrong Answer</btn>";
                    
                    else if(data.result == 4)
                        rows[i].cells[2].innerHTML = "<btn class='btn btn-danger btn-sm'>Time Limit</btn>";
                    
                    else if(data.result == 5)
                        rows[i].cells[2].innerHTML = "<btn class='btn btn-danger btn-sm'>Memory Limit</btn>";
                    
                    else if(data.result == 6){
                        if("<?=$this->session->userdata('user_id')?>" == data.userID)
                            rows[i].cells[2].innerHTML = "<a href='/index.php/manager/error/<?=$id?>/"+data.C_P_ID+"/"+data.ID+"/<?=$mode?>' class='btn btn-danger btn-sm'>Compile Error</a>";
                        else
                            rows[i].cells[2].innerHTML = "<btn class='btn btn-danger btn-sm'>Compile Error</btn>";
                    }
                    
                    else if(data.result == 8)
                        rows[i].cells[2].innerHTML = "<btn class='btn btn-danger btn-sm'>Output Limit</btn>";
                    
                    else if(data.result == 9)
                        rows[i].cells[2].innerHTML = "<btn class='btn btn-danger btn-sm'>Run-Time Error</btn>";                        
                    
                    else if(data.result == 10)
                        rows[i].cells[2].innerHTML = "<btn class='btn btn-danger btn-sm'>Presentation Error</btn>";

                    else if(data.result == 11)
                        rows[i].cells[2].innerHTML = "<btn class='btn btn-info btn-sm'>Empty Test-data</btn>";


                    var pr = data.pass_rate*100;
                    if(pr == 100)
                        rows[i].cells[3].innerHTML = "<span style='color:green'>"+pr+"</span> /100";
                    else if(pr == 0)
                        rows[i].cells[3].innerHTML = "<span style='color:red'>"+pr+"</span> /100";
                    else
                        rows[i].cells[3].innerHTML = "<span style='color:red'>"+pr.toFixed(1)+"</span> /100";

                    rows[i].cells[5].innerHTML = data.running_time+"<span style='color:red'> ms</span>";
                    rows[i].cells[6].innerHTML = data.memory+"<span style='color:red'> KB</span>";
                }
            }
        })
    }
   


</script>
