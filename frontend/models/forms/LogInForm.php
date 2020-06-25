<?php


namespace frontend\models\forms;


use frontend\models\User;
use yii\base\Model;

class LogInForm extends Model
{

    public $personal_id;
    public $password;

    public function rules()
    {
        return [
            ['personal_id' , 'required'],
            ['password' , 'required'],
            ['password' , 'validatePass'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'personal_id' => 'პირადი ნომერი',
            'password' => 'პაროლი'
        ];
    }

    public function validatePass($att)
    {

        $user = User::checkUser($this->personal_id);
        if (!$user || !$user->validatePass($this->password)) {
            $this->addError($att, 'Incorrect Personal Id or Password');
        }
    }

    public function login()
    {
        $user = User::checkUser($this->personal_id);
        if ($this->validate()) {
            return $user;
        }
    }
}