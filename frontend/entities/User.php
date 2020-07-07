<?php


namespace frontend\entities;


use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{

    public function rules()
    {
        return [
            [['name', 'surname', 'phone_number', 'email'], 'string'],
            ['phone_number', 'string', 'length' => 12],
            ['email', 'email'],
            ['phone_number', 'checkCorrect'],
            [['phone_number'], 'unique', 'targetClass' => User::class],
            [['email'], 'unique', 'targetClass' => User::class]
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'სახელი',
            'surname' => 'გვარი',
            'phone_number' => 'ტელ. ნომერი',
        ];
    }

    public function checkCorrect($att)
    {
        if (strpos($this->phone_number, '_')) {
            $this->addError($att, 'საჭიროა სწორად შევსება');
        }
    }

    public static function checkUser($personal_id)
    {
        return self::find()->where(['personal_id' => $personal_id])->one();
    }

    public function validatePass($password)
    {
        return \Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return bool if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function updateProfile()
    {
        if ($this->validate()) {
            $user = User::checkUser($this->personal_id);
            $user->name = $this->name;
            $user->surname = $this->surname;
            $user->phone_number = $this->phone_number;
            $user->email = $this->email;

            if ($user->save()) {
                return $user;
            }
        }
    }
}