<?php


namespace frontend\controllers;


use frontend\models\Contract;
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
        $contractList = Contract::find()
            ->where(['contract_owner_id' => \Yii::$app->user->identity->personal_id])
            ->all();

        return $this->render('contracts', compact('contractList'));
    }

    public function actionCreateContract()
    {
        $this->layout = 'personal-area';
        $model = new ContractForm();

        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', 'კონტრაქტი დამატებულია!');
        }

        return $this->render('create-contract', compact('model'));
    }

    public function actionDiscounts()
    {
        $this->layout = 'personal-area';

        return $this->render('discounts');
    }
}