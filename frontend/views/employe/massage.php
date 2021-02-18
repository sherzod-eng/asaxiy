<a href="<?= \yii\helpers\Url::to(['/employe/list-request'])?>" class="btn btn-primary">Back</a>
<?php if(count($model) > 0){ ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Note</th>
      <th scope="col">Intervyu date</th>
    </tr>
  </thead>
  <tbody>
  	<?php $i = 1; foreach ($model as $key) { ?>
    <tr>
      <th scope="row"><?= $i?></th>
      <td><?= $key->content?></td>
      <td><?= $key->inter_date?></td>
    </tr>
<?php $i++; }} else echo "<h3 align='center' class='alert alert-danger'>Xabarlar yoq!</h3>"; ?>
  </tbody>
</table>