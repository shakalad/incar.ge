<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>

    <div class="text-center">
        <h3>ხელშეკრულების შექმვნა</h3>
    </div>
<?php
$form = ActiveForm::begin([
    'id' => 'my_form',
    'options' => [
        'style' => 'border: 1px solid #CCC; padding: 20px;'
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


//$contract = $model;
echo $form->field($contract, 'place_of_work')
    ->dropDownList([
        'თბილისი' => 'თბილისი', 'რუსთავი' => 'რუსთავი', 'გორი' => 'გორი',
        'ქუთაისი' => 'ქუთაისი', 'ზუგდიდი' => 'ზუგდიდი', 'ბათუმი' => 'ბათუმი',
        'ქობულეთი' => 'ქობულეთი', 'ფოთი' => 'ფოთი',
    ]);

echo $form->field($contract, 'address')
    ->input('text', ['placeholder' => 'თბილისი, ჭავჭავაძის ქ.N77']);

echo $form->field($contract, 'car_brand')
    ->dropDownList([
        'Toyota' => 'Toyota', 'Bmw' => 'Bmw', 'Mercedes' => 'Mercedes', 'Opel' => 'Opel',
        'Honda' => 'Honda', 'Audi' => 'Audi'
    ]);

echo $form->field($contract, 'year_of_issue')
    ->dropDownList($contract->getYearsList(), ['options' => ['2015' => ['Selected' => true]]]);

echo $form->field($contract, 'color')
    ->dropDownList([
        'თეთრი' => 'თეთრი', 'შავე' => 'შავე', 'წითელი' => 'წითელი', 'ლურჯი' => 'ლურჯი',
        'ცისფერი' => 'ცისფერი', 'ვერცხლისფერი' => 'ვერცხლისფერი', 'რუხი' => 'რუხი',
        'ყავისფერი' => 'ყავისფერი', 'ყვითელი' => 'ყვითელი', 'მწვანე' => 'მწვანე',
    ]);

echo $form->field($contract, 'car_state_number')
    ->widget(\yii\widgets\MaskedInput::class, [
        'mask' => 'AA-999-AA'])
    ->input('text', ['minlength' => 9, 'placeholder' => 'AA-999-AA', 'style' => "text-transform: uppercase;"]);

echo $form->field($contract, 'steering_wheel')
    ->input('text', ['placeholder' => 'საჭე'])->dropDownList([
        'მარცხენა' => 'მარცხენა',
        'მარჯვენა' => 'მარჯვენა',
    ]);

echo $form->field($contract, 'licence')
    ->radioList([
        'მაქვს' => 'მაქვს',
        'არ მაქვს' => 'არ მაქვს'
    ], ['value' => 'არ მაქვს']);

echo $form->field($contract, 'licence_number')
    ->input('text', ['placeholder' => 'ლიცენზიის ნომერი']);

?>
    <div class="form-group">
        <div class="text-center">
            <?= Html::submitButton('გაგზავნა', ['class' => 'btn btn-warning']) ?>
        </div>
    </div>
    <script>
        window.onload = function () {
            var licence = document.querySelector('value=მაქვს');
            licence.onclick = function () {
                alert('hello');
            }
        }
    </script>
<?php ActiveForm::end();
