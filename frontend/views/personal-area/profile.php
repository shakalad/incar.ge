<div class="row">
        <div class="text-center">
            <h3>თქვენი პროფილი</h3>
        </div>
        <table class="table table-striped table-bordered text-center">
            <thead>
            <tr>
                <th scope="col" class="text-center">სახელი</th>
                <th scope="col" class="text-center">გვარი</th>
                <th scope="col" class="text-center">პირადი ნომერი</th>
                <th scope="col" class="text-center">ტელეფონის ნომერი</th>
                <th scope="col" class="text-center">ფოსტა</th>
            </tr>
            </thead>
            <tbody>

                <tr>
                    <th scope="row" class="text-center"><?=$profile->name?></th>
                    <td><?=$profile->surname?></td>
                    <td><?=$profile->personal_id?></td>
                    <td><?=$profile->phone_number?></td>
                    <td><?=$profile->email?></td>

                </tr>

            </tbody>
        </table>

    <div class="text-center">
        <?php echo \yii\helpers\Html::a(' ინფორმაციის რედაქტირება',
            ['personal-area/create-contract'],['class' => 'btn btn-warning']);?>
    </div>
</div>