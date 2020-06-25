<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

    <div class="text-center">
        <h3>შესვლა</h3>
    </div>

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
                                  {input}
                                </div>
                              </div>",
        'labelOptions' => ['class' => 'col-sm-4 col-form-label'],
    ],
]);
?>
    <div class="row">
        <div class="col-lg-12">
            <?
            echo $form->field($model, 'personal_id')->input('text', ['maxlength' => 11]);
            echo $form->field($model, 'password')->passwordInput();

            echo Html::submitButton('შესვლა', ['class' => 'btn btn-warning']);
            ?>
        </div>
    </div>

<?php
ActiveForm::end();
