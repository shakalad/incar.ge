<?php


namespace frontend\controllers;


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
}