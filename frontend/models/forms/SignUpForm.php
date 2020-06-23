<?php

namespace frontend\models\forms;


use frontend\models\User;
use yii\base\Model;

class SignUpForm extends Model
{
    public $name;
    public $surname;
    public $personal_id;
    public $phone_number;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['name', 'surname', 'personal_id', 'phone_number', 'email', 'password'], 'required'],
            [['personal_id'], 'unique', 'targetClass' => User::class],
            [['phone_number'], 'unique', 'targetClass' => User::class],
            [['email'], 'unique', 'targetClass' => User::class],
        ];
    }

    public function save()
    {
        if ($this->validate()) {
            $user = New User();
            $user->name = $this->name;
            $user->surname = $this->surname;
            $user->personal_id = $this->personal_id;
            $user->phone_number = $this->phone_number;
            $user->email = $this->email;
            $user->password_hash = \Yii::$app->security->generatePasswordHash($this->password);
            $user->auth_key = \Yii::$app->security->generateRandomString();

            if ($user->save()) {
                return true;
            }
        }
    }
}