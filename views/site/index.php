<?php
use yii\helpers\Url;

/** @var yii\web\View $this */

$this->title = 'СЕЗОН';
$this->registerCssFile('//fonts.googleapis.com/css2?family=Montserrat+Alternates&display=swap');
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">

    </div>

    <div class="body-content">

        <div class="row">
        <div class="d-flex justify-content-between flex-wrap my-12">
<?php foreach ($floor as $floors):?>
    <div id="carouselExampleDark" class="carousel carousel-dark slide" style="display: contents;">
        <div class="carousel-inner"  style="margin-top: 40px; border-radius: 5px;">
            <a href="<?php echo Url::toRoute(['shop/man','id'=>$floors['id']]);?>"
                       class="text-dark text-decoration-none ">
                <div class="carousel-item active">
                <img src="img/<?php echo $floors['image'];?>" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?php echo $floors['name'];?></h5>
                </div>
                </div>
            </a>    
        </div>
    </div>
    <?php endforeach; ?>
</div>
        </div>

    </div>
</div>
