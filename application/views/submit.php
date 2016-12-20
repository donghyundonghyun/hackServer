<div class="col-md-3">
</div>
<!-- submit btn 누르면 Controller's submit() 실행 -->
<div class="col-md-9">

<?php if(!isset($mode)){ ?>
<form id="submit_form" method="post" action="/index.php/judge/submit/<?=$class_id?>/<?=$contest_id?>/<?=$contest_problem_id?>" onsubmit="return do_submit();">
<?php }else{ ?>
<form id="submit_form" method="post" action="/index.php/manager/submit/<?=$id?>/<?=$contest_id?>/<?=$contest_problem_id?>/<?=$mode?>" onsubmit="return do_submit();">
<?php }
	 $mask = $contest->langmask;
?>
<input type="submit" class="btn btn-default" value="Submit"/>

<?php
	if($mask%2 == 1) { 
		$check = 'C';?>
		<label class="radio-inline">
		  <input type="radio" name="lang" id="C" value="1" onclick="basicSource('C');" checked> C(gcc-4.8.4)
		</label>
	<?php }
	$mask = $mask/2;
	if($mask%2 == 1) {
		if(!isset($check))
			$check = 'C++'; ?>
		<label class="radio-inline">
		  <input type="radio" name="lang" id="C++" value="2" onclick="basicSource('C++');" > C++(g++-4.8.4)
		</label>
	<?php }
	$mask = $mask/2;
	if($mask%2 == 1) {
		if(!isset($check))
			$check = 'java'; ?>
		<label class="radio-inline">
		  <input type="radio" name="lang" id="java" value="3" onclick="basicSource('java');"> java(java-1.8.0_101)
		</label>
	<?php }
	$mask = $mask/2;
	if($mask%2 == 1) { 
		if(!isset($check))
			$check = 'python2';?>
		<label class="radio-inline">
		  <input type="radio" name="lang" id="python2" value="4" onclick="basicSource('python2');"> Python2
		</label>
	<?php } 
		$mask = $mask/2;
		if($mask%2 == 1) {
			if(!isset($check))
				$check = 'python3'; ?>
			<label class="radio-inline">
			  <input type="radio" name="lang" id="python3" value="5" onclick="basicSource('python3');"> Python3
			</label>
	<?php } ?>


<br />
	<pre style="margin-top:5px" name="source_code" id="editor" ><?=$code?></pre>
	<input type="submit" class="btn btn-default" value="Submit"/>
</form>

</div>

<script src="/static/lib/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
	var editor = ace.edit("editor");
 	editor.setTheme("ace/theme/textmate");
 	//editor.setTheme("ace/theme/idle_fingers");
 	editor.session.setMode("ace/mode/c_cpp");

 	editor.setOptions({
 		fontFamily: "Consolas",
 		fontSize : "11pt",
 		minLines : 25,
 		maxLines : Infinity
 	});

 	//itor.setReadOnly(true);
 	function do_submit(){

  		if(editor.getValue() === ""){
  			alert("source code is empty!!!")
  			return false;
  		}
  		//alert(editor.getValue());
  		var form = document.getElementById("submit_form");

 		var hidden = document.createElement("textarea");
 		hidden.setAttribute("style","display:none");
 		hidden.setAttribute("name","real_source_code");
 		hidden.value = editor.getValue();
 		form.appendChild(hidden);
 		//document.body.appendChild(form);
 		//form.submit();
 		return true;
 	}
 	function basicSource(lang){
 		if (lang == 'C'){
 			editor.setValue("#include<stdio.h>\n\nint main(){\n\n\t/* Type or paste your code in this area */\n\n\treturn 0;\n}");
 			editor.session.setMode("ace/mode/c_cpp");
 		}else if(lang == 'C++'){
 			editor.setValue("#include<iostream>\n\nusing namespace std;\n\nint main(){\n\n\t/* Type or paste your code in this area */\n\n\treturn 0;\n}");
 			editor.session.setMode("ace/mode/c_cpp");
 		}else if(lang == 'java'){
 			editor.setValue("/* Class Name must be 'Main' */\npublic class Main {\n\n\tpublic static void main(String[] args){\n\t\t/* Type or paste your code in this area */\n\t}\n} ");
 			editor.session.setMode("ace/mode/java");
 		}else if(lang == 'python2' || lang == 'python3'){
 			editor.setValue("# Type or paste your code in this area");
 			editor.session.setMode("ace/mode/python");
 		}
 		editor.gotoLine(1);
 		editor.focus();
 	}
 	$(document).ready(function() {
 		var lang = '<?=$lang?>';
 		if(lang == ""){
 			basicSource('<?=$check?>');
	    	document.getElementById('<?=$check?>').checked = true;
 		}else{
 			if(lang=='1'){
 				document.getElementById('C').checked = true;
 				editor.session.setMode("ace/mode/c_cpp");
 			}
 			else if(lang=='2'){
 				document.getElementById('C++').checked = true;	
 				editor.session.setMode("ace/mode/c_cpp");
 			}
 			else if(lang=='3'){
 				document.getElementById('java').checked = true;
 				editor.session.setMode("ace/mode/java");	
 			}
 			else if(lang=='4'){
 				document.getElementById('python2').checked = true;	 		
 				editor.session.setMode("ace/mode/python");
 			}
 			else if(lang=='5'){
 				document.getElementById('python3').checked = true;	 		
 				editor.session.setMode("ace/mode/python");
 			}
 		}
	});
</script>
