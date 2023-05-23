<?php

/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'About';

?>
<div class="site-about">
   

    <div class="d-flex justify-content-between flex-wrap my-3">
    <?php foreach ($product as $products):?>
    <a href="<?php echo Url::toRoute(['shop/card', 'id'=>$products['id']]); ?>"class="text-dark text-decoration-none ">    
    <div class="card" style="width: 18rem; margin-top: 40px; font-family: 'Montserrat Alternates', sans-serif;">
    
        <img src="../img/<?php echo $products['image_one'];?>" class="card-img-top" alt="..." >
        <div class="card-body">
            <h3 class="card-title" style="font-family: 'Montserrat Alternates', sans-serif;">
                <?php echo $products['name'];?>
            </h3>
                <p class="card-text">Цена: <?php echo $products['price'];?> руб.</p>
                <a class="" href=""><img src="../img/like.svg" alt=""style="margin-left: 234px;margin-top: -45px;"></a>
        </div>
    </div>
</a>
                

               
<?php endforeach;?>
</div>
</div>
