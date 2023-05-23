<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\ProductSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="product-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'category_id') -> dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Category::find()->all(),'id','name'), ['prompt'=>' ']) ?>

    <?= $form->field($model, 'floor_id') -> dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Floor::find()->all(),'id','name'), ['prompt'=>' '])?>

    <?= $form->field($model, 'size_id')-> dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Size::find()->all(),'id','name'), ['prompt'=>' ']) ?>

    <?= $form->field($model, 'color_id')-> dropDownList(\yii\helpers\ArrayHelper::map(\app\models\Color::find()->all(),'id','name'), ['prompt'=>' ']) ?>

    <?= $form->field($model, 'min_price') ?>
    
    <?= $form->field($model, 'max_price') ?>

    <?php // echo $form->field($model, 'image_two') ?>

    <?php // echo $form->field($model, 'image_three') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'counts') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Поиск'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Анулировать'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
