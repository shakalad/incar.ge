<?php


namespace frontend\controllers;


use frontend\entities\Contract;
use frontend\entities\User;
use frontend\forms\ContractForm;
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
        $profile = User::find()
            ->where(['personal_id' => \Yii::$app->user->identity->personal_id])
            ->one();

        return $this->render('profile', compact('profile'));
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
        $contract = new ContractForm();

        if ($contract->load(\Yii::$app->request->post()) && $contract->save()) {
            \Yii::$app->session->setFlash('success', 'კონტრაქტი დამატებულია!');
        }

        return $this->render('create-contract', compact('contract'));
    }

    public function actionUpdateProfile()
    {
        $this->layout = 'personal-area';
        $model = User::find()
            ->where(['personal_id' => \Yii::$app->user->identity->personal_id])
            ->one();

        if ($model->load(\Yii::$app->request->post()) && $model->updateProfile()) {
            \Yii::$app->session->setFlash('success', 'თქვენ წარმატებიტ ');
        }

        return $this->render('update', compact('model'));

    }

    public function actionDiscounts()
    {
        $this->layout = 'personal-area';

        return $this->render('discounts');
    }
}