<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\user */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="row">
    <div class="text-center">
        <h3>პროფილის რედაქტირება</h3>
    </div>

    <div class="user-form">

        <?php $form = ActiveForm::begin([
            'id'  => 'my_form',
            'options' => [
                'style' => 'border: 1px solid #CCC; padding: 20px;',
                'class' => 'col-md-offset-3 col-md-6'
            ],

            'fieldConfig' => [
                'template' => "<div class=\"form-group row\">
                                   {label}
                                <div class=\"col-sm-8\">
                                  {input}{error}
                                </div>
                              </div>",
                'labelOptions' => ['class' => 'col-sm-4 col-form-label'],
            ],
        ]);

        echo $form->field($model, 'name');
        echo $form->field($model, 'surname');
        echo $form->field($model, 'phone_number')
            ->widget(\yii\widgets\MaskedInput::class, [
                'mask' => '599 99-99-99'
            ]);
        echo $form->field($model, 'email');
        ?>

        <div class="form-group">
            <?= Html::submitButton('განახლება', ['class' => 'btn btn-warning']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>

