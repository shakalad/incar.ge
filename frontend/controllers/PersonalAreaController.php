<?php


namespace frontend\controllers;


use frontend\models\forms\ContractForm;
use yii\web\Controller;

class PersonalAreaController extends Controller
{
    public function actionIndex()
    {
        $this->layout = 'personal-area';
    }

    public function actionProfile()
    {
        $this->layout = 'personal-area';

        return $this->render('profile');
    }

    public function actionContracts()
    {
        $this->layout = 'personal-area';
        $model = new ContractForm();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'Contract Added!');
        }

        return $this->render('contracts', compact('model'));
    }

    public function actionDiscounts()
    {
        $this->layout = 'personal-area';

        return $this->render('discounts');
    }
}