<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Каталог товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="d-flex justify-content-between flex-wrap my-3">
    <?php foreach ($floor as $category):?>
        <div class="card" href="<?php echo Url::toRoute(['shop/listproduct','id'=>$category['id']]);?>">
            <img src="img/<?= $category['image'];?>" alt="" class="card-img">
            <div class="card-body">
                <h3 class="card-title">
                    <a href="<?php echo Url::toRoute(['shop/listproduct','id'=>$category['id']]);?>"
                       class="text-dark text-decoration-none ">
                       <?php echo $category['name'];?>
                    </a>
                </h3>
            </div>
        </div>
    <?php endforeach; ?>
</div>
</div>
</div>
