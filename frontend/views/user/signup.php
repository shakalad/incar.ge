<?php

use yii\widgets\ActiveForm;
use yii\helpers\Html;
?>

    <div class="text-center">
        <h3>დარეგისტრირება</h3>
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
                                  {input}{error}
                                </div>
                              </div>",
        'labelOptions' => ['class' => 'col-sm-4 col-form-label'],
    ],
]);
?>
    <div class="row">
        <div class="col-lg-12">
            <?php
                echo $form->field($model, 'name');
                echo $form->field($model, 'surname');
                echo $form->field($model, 'personal_id')->input('text', ['maxlength' => 11]);
                echo $form->field($model, 'phone_number')
                    ->widget(\yii\widgets\MaskedInput::class, [
                        'mask' => '599 99-99-99'
                    ]);
                echo $form->field($model, 'email');
                echo $form->field($model, 'password')->passwordInput();

                echo Html::submitButton('რეგისტრაცია', ['class' => 'btn btn-warning']);
            ?>
        </div>
    </div>
<?php
ActiveForm::end();
