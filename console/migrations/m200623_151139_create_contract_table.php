<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%contract}}`.
 */
class m200623_151139_create_contract_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%contract}}', [
            'contract_owner_id' => $this->string(),
            'address' => $this->string(),
            'place_of_work' => $this->string(),
            'car_brand' => $this->string(),
            'year_of_issue' => $this->integer(),
            'color' => $this->string(),
            'car_state_number' => $this->string()->unique(),
            'steering_wheel' => $this->string(),
            'licence' => $this->string(),
            'licence_number' => $this->string(),
            'contract_start' => $this->timestamp(),
            'contract_expire' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%contract}}');
    }
}
