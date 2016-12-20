<div class="col-md-3">
</div>
<div class="col-md-9">
  <table class="table table-striped ">
    <thead>
      <tr style="background:#E0E0E0">
        <th style="text-align:center">Title</th>
        <th style="text-align:center">Time limit</th>
        <th style="text-align:center">Memory limit</th>
      </tr>
    </thead>
    <tbody>
      <tr>
          <td style="text-align:center"><?= $info->title ?></td>
          <td style="text-align:center"><?= $info->time_limit ?>ms</td>
          <td style="text-align:center"><?= $info->memory_limit ?>MB</td>
      </tr>
    </tbody>
  </table>

  <pre><?=$info->description?></pre>

  <div style="text-align:center">
    <a class="btn btn-default" href="/index.php/manager/testsubmitpage/<?=$id?>/<?=$info->ID?>/<?=$mode?>">
      Submit
    </a>
  </div>
</div>
