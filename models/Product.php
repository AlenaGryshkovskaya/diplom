<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property string $name
 * @property int $category_id
 * @property int|null $floor_id
 * @property string $image_one
 * @property string|null $image_two
 * @property string|null $image_three
 * @property float $price
 * @property string $description
 * @property int $size_id
 * @property int|null $color_id
 * @property int $counts
 * @property string $created_at
 *
 * @property Basket[] $baskets
 * @property Category $category
 * @property Color $color
 * @property Floor $floor
 * @property Order[] $orders
 * @property Size $size
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'category_id', 'image_one', 'price', 'description', 'size_id', 'counts'], 'required'],
            [['category_id', 'floor_id', 'size_id', 'color_id', 'counts'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['name', 'image_one', 'image_two', 'image_three'], 'string', 'max' => 256],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['color_id'], 'exist', 'skipOnError' => true, 'targetClass' => Color::class, 'targetAttribute' => ['color_id' => 'id']],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Size::class, 'targetAttribute' => ['size_id' => 'id']],
            [['floor_id'], 'exist', 'skipOnError' => true, 'targetClass' => Floor::class, 'targetAttribute' => ['floor_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Наименование'),
            'category_id' => Yii::t('app', 'Категория'),
            'floor_id' => Yii::t('app', 'Пол'),
            'image_one' => Yii::t('app', 'Первое изображение'),
            'image_two' => Yii::t('app', 'Второе изображение'),
            'image_three' => Yii::t('app', 'Третие изображение'),
            'price' => Yii::t('app', 'Цена'),
            'description' => Yii::t('app', 'Информация о товаре'),
            'size_id' => Yii::t('app', 'Размер'),
            'color_id' => Yii::t('app', 'Цвет'),
            'counts' => Yii::t('app', 'Количество'),
            'created_at' => Yii::t('app', 'Дата добавления'),
        ];
    }

    /**
     * Gets query for [[Baskets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBaskets()
    {
        return $this->hasMany(Basket::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[Color]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getColor()
    {
        return $this->hasOne(Color::class, ['id' => 'color_id']);
    }

    /**
     * Gets query for [[Floor]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFloor()
    {
        return $this->hasOne(Floor::class, ['id' => 'floor_id']);
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[Size]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::class, ['id' => 'size_id']);
    }
}
