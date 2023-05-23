<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read User|null $user
 *
 */
class RegisterForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;
    public $name;
    public $surname;
    public $patronomic;
    public $email;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            // username and password are both required
            //[['username', 'password', 'name', 'surname', 'email', 'password_repeat'], 'required'],
            // rememberMe must be a boolean value
           // ['email', 'email'],
            //['username', 'unique', 'targetClass'=> 'app\models\User', 'massage' =>'Логин занят'],
           // ['email', 'unique', 'targetClass'=> 'app\models\User', 'massage' =>'Email занят'],
           // ['patronomic', 'string'],
           // [['name', 'surname', 'patronomic'], 'match', 'pattern' => '/^[а-яФ-ЯёЁ]+$/u', 'massage'=>'Имя, фамилия, отчество может содержать только буквы русского алфавита'],
           // ['password', 'string', 'min'=> 6],
           // ['password_repeat', 'string'],
            //['password', 'compare', 'compareAttribute'=> 'password_repeat', 'massage' =>'Пароль не совподает'],

            [['username', 'password', 'name', 'surname', 'email'], 'required'],
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Логин уже занят'],
            ['email', 'unique', 'targetClass' => '\app\models\User', 'message' => 'Почта уже занята'],
            ['patronomic', 'string'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'string'],
            ['password_repeat', 'compare', 'compareAttribute' => 'password'],
        ];
    }

    public function register()
    {
        if (!$this->validate()) {
            return null;
        }
    
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->name = $this->name;
        $user->surname = $this->surname;
        $user->patronomic = $this->patronomic;
        $user->HashPassword($this->password);
    
        return $user->save() ? $user : null;
        
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
            'password'=> Yii::t('app', 'Пароль'),
            'password_repeat'=> Yii::t('app', 'Повторите пароль'),
            'is_admin'=> Yii::t('app', 'Статус пользователя'),
        ];
    }
}
