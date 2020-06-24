<?php

 use yii\helpers\Html;
 use yii\widgets\ActiveForm;

 $form = ActiveForm::begin();
    echo $form->field($model, 'address');
    echo $form->field($model, 'place_of_work');
    echo $form->field($model, 'car_brand');
    echo $form->field($model, 'year_of_issue');
    echo $form->field($model, 'color');
    echo $form->field($model, 'car_state_number');
    echo $form->field($model, 'steering_wheel');
    echo $form->field($model, 'licence');
    echo $form->field($model, 'licence_number');

    echo Html::submitButton('Create Contract', ['class' => 'btn btn-warning']);
ActiveForm::end();
