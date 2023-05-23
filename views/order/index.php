<?php
/** @var yii\web\View $this */

use yii\helpers\Url;

?>
<h1>Заказы</h1>
<div class="table-response">
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Наименование товара</th>
      <th scope="col">Количество</th>
      <th scope="col">Статус</th>
      <th scope="col">Действие</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($order as $orders): ?>
        <tr>
        <td><?= $orders->product->name ?></td>
        <td><?= $orders->counts ?></td>
        <?php if ($orders->status ==0): ?>
            <td>Отменён</td>
        <?php elseif ($orders->status ==1): ?>
            <td>Новый</td>
        <?php elseif ($orders->status ==2): ?>
            <td>Подтверждённый</td>
        <?php endif; ?>
        <td>
            <div class="row">
                <div class="col">
                <?php if ($orders->status ==1): ?>
                    <a href="<?= Url::toRoute(['bascet/remove', 'id'=>$orders->id])?>" class="btn btn-danger">Убрать</a>
                <?php else: ?>
                    <p>Возможности удалить заказа нет</p>
                <?php endif; ?>
                </div>
            </div>
        </td>
        </tr>
    <?php endforeach;?>
  </tbody>
    </table>
</div>