<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $name
 * @property string $surname
 * @property string $patronymic
 * @property string $email
 * @property int $is_admin
 * @property string $authKey
 * @property int $created_at
 */

class User extends ActiveRecord implements \yii\web\IdentityInterface
{

    public $authKey;
    public $accessToken;

    private static $users;

    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return User::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username'=>$username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password,$this->password);
    }

    public function HashPassword($password){
        $this->password = Yii::$app->security->generatePasswordHash($password);
    }
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Логин'),
            'name' => Yii::t('app', 'Имя'),
            'surname' => Yii::t('app', 'Фамилия'),
            'patronomic' => Yii::t('app', 'Отчество'),
            'email'=> Yii::t('app', 'Почта'),
            'is_admin'=> Yii::t('app', 'Статус пользователя'),
        ];
    }

}
