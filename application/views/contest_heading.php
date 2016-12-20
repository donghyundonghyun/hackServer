<div class="col-md-9">
    <h3 style="text-align:center"><?=$name?> <?=$contest->name?> <!--  <span style="color:red">진행중</span> --></h3>
    <h4 style="text-align:center">
    	Starting Time : <span style="color:blue"><?=$contest->startTime?></span>
    	 / Ending Time : <span style="color:red"><?=$contest->endTime?></span>
    </h4>
    <h4 style="text-align:center">Current time : <span id="nowdate"></span></h4>
	<?php
		$now = date("Y-m-d H:i:s");
		if($contest->exam == true){
	?>
			<p style="text-align:center"> <a id="startExam" class="btn btn-default" name="startExam">Click this button to start</a> </p>
			<h4 id="running" style="text-align:center; color:red">
				<?php if($running) {?>
					Exam Running!!
				<?php } ?>
			</h4>
	<?php
		}else if( ($contest->startTime=='Infinite'|| $contest->startTime<=$now) && ($contest->endTime == 'Infinite' || $contest->endTime >= $now)) { 	
	?>			
			<h4 style="text-align:center; color:red">Running!!</h4>
	<?php		
		}
	?>
	   
    

</div>

<script>
	var diff=new Date("<?php echo date("Y/m/d H:i:s")?>").getTime()-new Date().getTime();
	//alert(diff);
	function clock(){
		var x,h,m,s,n,xingqi,y,mon,d;
		var x = new Date(new Date().getTime()+diff);
		y = x.getYear()+1900;
		if (y>3000) 
			y-=1900;
		mon = x.getMonth()+1;
		d = x.getDate();
		xingqi = x.getDay();
		h=x.getHours();
		m=x.getMinutes();
		s=x.getSeconds();
		n=y+"-"+(mon>=10?mon:"0"+mon)+"-"+(d>=10?d:"0"+d)+" "+(h>=10?h:"0"+h)+":"+(m>=10?m:"0"+m)+":"+(s>=10?s:"0"+s);
		//alert(n);
		document.getElementById('nowdate').innerHTML=n;
		setTimeout("clock()",1000);
	}
	clock();



    $('#startExam').click(function(){
        $.ajax({
            url:'/index.php/exam/ispossible/<?=$class_id?>/<?=$contest->ID?>',
            dataType:'json',
            cache: false,
            crossDomain: true,
            contentType: 'application/json; charset=utf-8',
            beforeSend: function(){
            	if (confirm("시험을 시작하시겠습니까?\n시험이 시작되면 다른 메뉴사용이 제한됩니다.") == true){    //확인
				    return true;
				}else{   //취소
				    return false;
				}
			},
            success:function(data){
            	if(data.ispossible == true){
            		alert("시험이 시작되었습니다.");
            		document.getElementById('running').innerHTML = "Exam Running!!";
            	}
            	else
            		alert(data.message);	
            },
            error : function(xhr, status, error) {
                 alert(xhr);
                 alert(status);
                 alert(error);
            }
        })
    });


</script>