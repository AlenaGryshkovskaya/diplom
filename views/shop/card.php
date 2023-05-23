<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;


?>
<div class="site-about">
<div class="my-2">
    <div class="row">
        <div class="col">
        <div id="carouselExampleFade" class="carousel slide carousel-fade">
  <div class="carousel-inner">
    <div class="carousel-item active">
    <img style="border-radius: 5px;" src="../img/<?php echo $product['image_one']; ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img style="border-radius: 5px;" src="../img/<?php echo $product['image_two']; ?>" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
    <img style="border-radius: 5px;" src="../img/<?php echo $product['image_three']; ?>" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Предыдущий</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleFade" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Следующий</span>
  </button>
</div>
        </div>

        

        <div class="col">
            <h3 class="card-title"><?php echo $product['name'];?></h3>
            <p class="card-text">Цена: <?php echo $product['price'];?> руб.</p>
            



<div class="accordion" id="accordionPanelsStayOpenExample">
  <div class="accordion-item">
    <h2 class="accordion-header">
      <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapseOne" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
        Информация о товаре
      </button>
    </h2>
    <div id="panelsStayOpen-collapseOne" class="accordion-collapse collapse show">
      <div class="accordion-body">
       <p class="card-text"><small class="text-muted">Описание: <?php echo $product['description'];?></small></p>
      </div>
    </div>
  </div>
</div>

            
            <?php if ($product['counts']>0): ?>
                <p>В наличии:<span class="count_prod"> <?php echo $product['counts'];?></span></p>
            <?php else: ?>
                <p>Нет в наличии </p>
            <?php endif;?>

            <?php if (!Yii::$app->user->isGuest): ?>
                <div class="d-grid gap-2">
                    <a href="<?= Url::toRoute(['shop/add', 'id' => $product->id]) ?>" class="btn btn-primary">В корзину</a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
</div>
