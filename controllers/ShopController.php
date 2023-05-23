<?php

namespace app\controllers;

use app\models\Product;
use app\models\ProductSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Basket;
use app\models\Floor;
use app\models\Category;
use yii\web\NotAcceptableHttpException;

/**
 * ShopController implements the CRUD actions for Product model.
 */
class ShopController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Product models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Product();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }

    public function actionCatalog()
    {
//В переменную $categories получаем все данные из модели Category (которую сгенерировали)
       // $floop=Floor::find()->asArray()->all();
        //return $this -> render('floor',compact('floor'));
    }
    public function actionMan()
    {
        $category = Category::find()->all();
        


        if(isset($_GET['id']) && $_GET['id']!="")
        {
            $floor=Floor::find()->where(['id'=>$_GET['id']])->asArray()->one();
            $product=Product::find()->where(['floor_id'=>$_GET['id']])->asArray()->all();
            return $this->render('man',compact('floor','product'));
        }
        else
            return $this->redirect(['shop/index']);
        //return $this->render('man');
    }

    public function actionAdd()
    {
        $id = Yii::$app->request->get('id');
        $product = Product::findOne($id);
        $user_id = Yii::$app->user->id;
        $basket_id = Basket::find()->where(['product_id'=>$id, 'user_id'=>$user_id])->one();
        if ($product->counts!=0){
            if ($basket_id){
                $basket_id->product_id = $product->id;
                $basket_id->user_id = Yii::$app->user->id;
                $basket_id->counts =  $basket_id->counts + 1;
                $product->counts -=1;
                $product->save();
                $basket_id->save();
                Yii::$app->session->setFlash('success', 'Товар в корзине');
            } else{
                $basket = new Basket();
                $basket->product_id = $product->id;
                $basket->user_id = Yii::$app->user->id;
                $basket->counts =  $basket->counts + 1;
                $product->counts -=1;
                $product->save();
                $basket->save();
                Yii::$app->session->setFlash('success', 'Товар в корзине');
            } 
        } else{
            Yii::$app->session->setFlash('error', 'Товара нет в наличиие');
        }
           return $this->goHome();
    }

    public function actionCard()
    {
        if(isset($_GET['id']) && !empty($_GET['id'])  && filter_var($_GET['id'], FILTER_VALIDATE_INT)){
            $id = $_GET['id']; // берем id ТОВАРА из массива $_GET[]
        }
        else{
            throw new NotAcceptableHttpException();
        }
        $product=Product::findOne($id);
        return $this -> render('card', compact('product','id'));
    }

}
