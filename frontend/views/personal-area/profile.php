<?php

use yii\widgets\DetailView;

?>
<div class="row">
        <div class="text-center">
            <h3>თქვენი პროფილი</h3>
        </div>
    <?= DetailView::widget([
        'model' => $profile,
        'attributes' => [
            ['label' => 'სახელი', 'attribute' => 'name'],
            ['label' => 'გვარი', 'attribute' => 'surname'],
            ['label' => 'პირადი ნომერი', 'attribute' => 'personal_id'],
            ['label' => 'ტელეფონის ნომერი', 'attribute' => 'phone_number'],
            'email:email',
        ],
    ]) ?>

    <div class="text-center">
        <?php echo \yii\helpers\Html::a(' ინფორმაციის რედაქტირება',
            ['personal-area/update-profile'],['class' => 'btn btn-warning']);?>
    </div>
</div>