
<!-- submit btn 누르면 Controller's submit() 실행 -->
<div class="col-md-9">

	<pre name="source_code" id="editor"><?=htmlspecialchars($code->sourceCode)?></pre>

</div>

<script src="/static/lib/ace/src-noconflict/ace.js" type="text/javascript" charset="utf-8"></script>
<script>
	//document.getElementById("editor").innerHTML = ;
	var editor = ace.edit("editor");
 	editor.setTheme("ace/theme/textmate");
 	//editor.setTheme("ace/theme/idle_fingers");
 	var lang = <?=$code->language?>;
	if(lang == 1){
		editor.session.setMode("ace/mode/c_cpp");
 	}else if(lang==2){
		editor.session.setMode("ace/mode/c_cpp");
 	}else if(lang==3){
		editor.session.setMode("ace/mode/java");
 	}else if(lang==4 || lang == 5){
 		editor.session.setMode("ace/mode/python");
 	}
 	//editor.session.setMode("ace/mode/c_cpp");
 	editor.setReadOnly(true);
 	//editor.container.style.pointerEvents="none";
 	editor.renderer.$cursorLayer.element.style.display="none";
 	editor.setOptions({
 		fontFamily: "Consolas",
 		fontSize : "11pt",
 		minLines : 20,
 		maxLines : Infinity,
 		VScroll : true
 	});
 	
</script>
