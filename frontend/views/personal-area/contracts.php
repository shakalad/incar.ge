<?php

?>

<div class="row">
    <?php if ($contractList != null):?>
        <div class="text-center">
            <h3>თქვენი ხელშეკრულებები</h3>
        </div>
        <table class="table table-striped table-bordered text-center">
            <thead>
            <tr>
                <th scope="col" class="text-center">მარკა/მოდელი</th>
                <th scope="col" class="text-center">სახელმწიფო ნომერი</th>
                <th scope="col" class="text-center">დაწყება</th>
                <th scope="col" class="text-center">დასრულება</th>
                <th scope="col" class="text-center">სტატუსი</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($contractList as $contract):?>
                <tr>
                    <th scope="row" class="text-center"><?=$contract->car_brand?></th>
                    <td><?=$contract->car_state_number?></td>
                    <td><?=$contract->contract_start?></td>
                    <td><?=$contract->contract_expire?></td>
                    <td>
                        <?php if  ($contract->contract_status == 1) {
                           echo "<span
                            class=\"glyphicon glyphicon-ok\" aria-hidden=\"true\"> აქტიური</span>";
                        } else if($contract->contract_status == 0) {
                            echo "<span
                            class=\"glyphicon glyphicon-refresh\" aria-hidden=\"true\"> მუშავდება </span>";
                        }  else if($contract->contract_status == -1) {
                            echo "<span
                            class=\"glyphicon glyphicon-remove\" aria-hidden=\"true\"> უარყოფილი</span>";
                        }else {
                            echo "<span
                            class=\"glyphicon glyphicon-trash\" aria-hidden=\"true\"> გაუქმებული</span>";
                        }?>
                    </td>

                </tr>
            <?endforeach;?>
            </tbody>
        </table>
    <?php else:?>
        <div class="text-center">
            <h2>თქვენ არ გაქვთ ხელშეკრულებები</h2>
        </div>
    <?php endif;?>
    <div class="text-center">
        <?php echo \yii\helpers\Html::a(' + ხელშეკრულების შექმნა',
        ['personal-area/create-contract'],['class' => 'btn btn-warning']);?>
    </div>
</div>

