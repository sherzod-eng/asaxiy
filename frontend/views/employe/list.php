<?php if(count($model)>0){ ?>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Surname</th>
      <th scope="col">Address</th>
      <th scope="col">Status</th>
      <th scope="col">Massage</th>
    </tr>
  </thead>
  <tbody>
  	<?php $i = 1; foreach ($model as $key) { ?>
    <tr>
      <th scope="row"><?= $i?></th>
      <td><?= $key->name?></td>
      <td><?= $key->surname?></td>
      <td><?= $key->address?></td>
      <td><span class="badge badge-success"><?= $key->status->title?></span></td>
        <td><a class="badge badge-success" href="<?= \yii\helpers\Url::to(['employe/massage', 'id' => $key->id])?>">View</a></td>
    </tr>
<?php $i++; }} else { echo "<h4 class='alert alert-danger'>Sizda yuborilgan arizalar mavjud emas!</h4>";}?>
  </tbody>
</table>
<a class="btn btn-success" href="<?= \yii\helpers\Url::to(['/employe/add-request']) ?>">Ariza yuborish</a>