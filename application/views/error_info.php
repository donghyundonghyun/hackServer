 <div class="col-md-9">
<?php foreach($error as $obj){
?>
<pre class="alert alert-danger" role="alert"><span class="sr-only">Error:</span><?=$obj->errorInfo?></pre>

<?php }?>
 </div>

