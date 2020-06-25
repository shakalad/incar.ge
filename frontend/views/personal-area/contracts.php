<?php

 use yii\helpers\Html;
 use yii\widgets\ActiveForm;

 ?>

    <div class="text-center">
        <h3>ხელშეკრულების შექმვნა</h3>
    </div>
<?php
 $form = ActiveForm::begin([
     'id'  => 'my_form',
     'options' => [
         'style' => 'border: 1px solid #CCC; padding: 20px;'
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

    echo $form->field($model, 'address' )
        ->input('text', ['placeholder' => 'თბილისი']);

    echo $form->field($model, 'place_of_work')
        ->input('text', ['placeholder' => 'თბილისი, ჭავჭავაძის ქ.N77']);

    echo $form->field($model, 'car_brand')
        ->widget(\yii\widgets\MaskedInput::class, [
            'mask' => 'a{3,12} / a{0,12}9{1,7}'
        ])
        ->input('text', ['placeholder' => 'TOYOTA / AQUA', 'style' => 'text-transform: uppercase;']);

    echo $form->field($model, 'year_of_issue')
        ->input('text', ['placeholder' => '2013']);

    echo $form->field($model, 'color')
        ->input('text', ['placeholder' => 'თეთრი']);

    echo $form->field($model, 'car_state_number')
        ->widget(\yii\widgets\MaskedInput::class, [
            'mask' => 'AA-999-AA'])
        ->input('text', ['placeholder' => 'AA-999-AA', 'style' =>"text-transform: uppercase;"]);

    echo $form->field($model, 'steering_wheel')
        ->input('text', ['placeholder' => 'საჭე'])->dropDownList([
            'მარცხენა' => 'მარცხენა',
            'მარჯვენა' => 'მარჯვენა',
        ]);

    echo $form->field($model, 'licence')
        ->radioList([
            'კი' => 'კი',
            'არა' => 'არა'
        ], ['value' => 'კი'])->label();

    echo $form->field($model, 'licence_number')
        ->input('text', ['placeholder' => 'ლიცენზიის ნომერი']);

    ?>
<div class="form-group">
    <div class="text-center">
        <?= Html::submitButton('გაგზავნა', ['class' => 'btn btn-warning'])?>
    </div>
</div>
<?php
ActiveForm::end();
