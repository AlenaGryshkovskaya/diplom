<?php
/** @var yii\web\View $this */

use yii\helpers\Url;

?>
<h1>Корзина</h1>
<div class="table-response">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Наименование товара</th>
      <th scope="col">Количество</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($basket as $baskets): ?>
        <tr>
        <td><?= $baskets->product->name ?></td>
        <td><?= $baskets->counts ?></td>
        <td>
            <div class="row">
                <div class="col">
                    <a href="<?= Url::toRoute(['bascet/add', 'id'=>$baskets->id])?>" class="btn btn-success">Добавить</a>
                </div>
                <div class="col">
                    <a href="<?= Url::toRoute(['bascet/remove', 'id'=>$baskets->id])?>" class="btn btn-danger">Убрать</a>
                </div>
            </div>
        </td>
        </tr>
    <?php endforeach;?>
  </tbody>
    </table>
</div>
