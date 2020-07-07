<?php


namespace frontend\controllers;


use frontend\forms\LogInForm;
use frontend\forms\SignUpForm;
use yii\web\Controller;

class UserController extends Controller
{

    public function actionIndex()
    {

        return $this->render('index');
    }
    public function actionSignUp()
    {

        $model = new SignUpForm();

        if ($model->load(\Yii::$app->request->post()) && $user = $model->save()) {
            \Yii::$app->session->setFlash('success', 'თქვენ წარმატებით დარეგისტრირდიტ!!');
            \Yii::$app->user->login($user);
            return \Yii::$app->controller->redirect(['personal-area/contracts']);
        }

        return $this->render('signup', compact('model'));
    }

    public function actionLogin()
    {

        $model = new LogInForm();

        if ($model->load(\Yii::$app->request->post()) && $user = $model->login()) {
            \Yii::$app->user->login($user);
            return \Yii::$app->controller->redirect(['personal-area/contracts']);
        }

        return $this->render('login', compact('model'));
    }

    public function actionLogout()
    {
        \Yii::$app->user->logout();
        return $this->goHome();
    }
}