<?php

namespace app\controllers;

use app\models\Basket;
use Yii;

class BascetController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $user_id = Yii::$app->user->id;
        $basket = Basket::find()->where(['user_id'=> $user_id])->all();
        $context = [
            'basket' => $basket
        ];
        return $this->render('index', $context);
    }

    public function actionAdd($id){
        $id = Yii::$app->request->get('id');

        $basket = Basket::findOne($id);

        if ($basket->product->counts != 0){
            $basket->counts+=1;
            $basket->product->counts-=1;
            $basket->save();
            $basket->product->save();
            Yii::$app->session->setFlash('seccess', 'Товар добавлен в корзину');
        }else{
            Yii::$app->session->setFlash('error', 'Товара нет в наличии');
        }
        return $this->redirect('/basket/index/');
    }

    public function actionRemove(){
        $id = Yii::$app->request->get('id');

        $basket = Basket::findOne($id);
        if ($basket->counts==1){
            $basket->delete();
        }else{
            $basket->counts-=1;
            $basket->save();
            $basket->product->counts+=1;
            $basket->product->save();
        }
        Yii::$app->session->setFlash('seccess', 'Товар товар удалён из корзины');
        return $this->redirect('/basket/index/');
    }
}
