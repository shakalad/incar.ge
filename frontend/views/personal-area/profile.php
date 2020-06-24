<?php

?>

<div class="row">
    <table class="table table-striped table-bordered text-center">
        <thead>
        <tr>
            <th scope="col" class="text-center">მარკა/მოდელი</th>
            <th scope="col" class="text-center">სახელმწიფო ნომერი</th>
            <th scope="col" class="text-center">დაწყება</th>
            <th scope="col" class="text-center">დასრულება</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($contractList as $contract):?>
            <tr>
                <th scope="row" class="text-center"><?=$contract->car_brand?></th>
                <td><?=$contract->car_state_number?></td>
                <td><?=$contract->contract_start?></td>
                <td><?=$contract->contract_expire?></td>
            </tr>
        <?endforeach;?>
        </tbody>
    </table>
</div>
