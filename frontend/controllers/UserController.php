<?php


namespace frontend\controllers;


use frontend\models\forms\LogInForm;
use frontend\models\forms\SignUpForm;
use yii\web\Controller;

class UserController extends Controller
{
    public function actionSignUp()
    {

        $model = new SignUpForm();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('warning', 'You have been registred!');
            return $this->goHome();
        }

        return $this->render('signup', compact('model'));
    }

    public function actionLogin()
    {

        $model = new LogInForm();

        if ($model->load(\Yii::$app->request->post()) && $user = $model->login()) {
            \Yii::$app->user->login($user);
            return $this->goHome();
        }

        return $this->render('login', compact('model'));
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }
}