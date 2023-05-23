<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "floor".
 *
 * @property int $id
 * @property string $name
 * @property string|null $image
 *
 * @property Product[] $products
 */
class Floor extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'floor';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name', 'image'], 'string', 'max' => 256],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'name' => Yii::t('app', 'Пол'),
            'image' => Yii::t('app', 'Изображение'),
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['floor_id' => 'id']);
    }
}
