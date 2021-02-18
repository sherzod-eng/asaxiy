
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Address</th>
      <th scope="col">Edit status</th>
      <th scope="col">Massage</th>
    </tr>
  </thead>
  <tbody>
  	<?php  $i = 1; foreach ($model as $key) { ?>
    <tr>
      <th scope="row"><?= $i?></th>
      <td><?= $key->name?></td>
      <td><?= $key->surname?></td>
      <td><?= $key->address?></td>
      <td><a href="<?= \yii\helpers\Url::to(['employe/edit-status', 'id' => $key->id])?>"  class="badge badge-success"><?= $key->status->title?></a></td>
      <td><a href="<?= \yii\helpers\Url::to(['employe/massage', 'id' => $key->id])?>" class="badge badge-success">Send</a></td>
    </tr>
<?php $i++; }?>
  </tbody>
</table>