<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;

$form = ActiveForm::begin();
?>
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <?
                echo $form->field($model, 'personal_id')->input('text', ['maxlength' => 11]);
                echo $form->field($model, 'password')->passwordInput();

                echo Html::submitButton('Login', ['class' => 'btn btn-warning']);
                ?>
            </div>
        </div>
    </div>
<?php
ActiveForm::end();
