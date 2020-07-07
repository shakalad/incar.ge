<?php


namespace frontend\forms;



use frontend\entities\Contract;
use frontend\entities\User;
use yii\base\Model;


class ContractForm extends Model
{

    public $contract_owner_id;
    public $address;
    public $place_of_work;
    public $car_brand;
    public $year_of_issue;
    public $color;
    public $car_state_number;
    public $steering_wheel;
    public $licence;
    public $licence_number;
    public $contract_start;
    public $contract_expire;

    public function rules()
    {
        return [
           [
               [
               'address', 'place_of_work', 'car_brand', 'year_of_issue',
               'color', 'car_state_number', 'steering_wheel', 'licence',
              ], 'required'],
            ['licence_number', 'string'],
            ['car_state_number', 'checkCorrectCarNumber'],
            ['car_state_number', 'unique', 'targetClass' => Contract::class],
        ];
    }

    public function checkCorrectCarNumber($att)
    {
        if (strpos($this->car_state_number, '_')) {
            $this->addError($att, 'საჭიროა სწორად შევსება');
        }
    }

    public function attributeLabels()
    {
        return [
            'address' => 'მისამართი',
            'place_of_work' => 'საქმიანობის ადგილი',
            'car_brand' => 'ავტომობილის მარკა/მოდელი',
            'year_of_issue' => 'გამოშვების წელი',
            'color' => 'ავტომობილის ფერი',
            'car_state_number' => 'სახელმწიფო ნომერი',
            'steering_wheel' => 'საჭე',
            'licence' => 'ლიცენზიის ფლობა',
            'licence_number' => 'ლიცენზიის ნომერი'
        ];
    }

    public function save()
    {
        if ($this->validate()) {

            $user = User::findIdentity(\Yii::$app->user->identity->getId());
            $contract = new Contract();
            $contract->contract_owner_id = \Yii::$app->user->identity->personal_id;
            $contract->address = $this->address;
            $contract->place_of_work = $this->place_of_work;
            $contract->car_brand = $this->car_brand;
            $contract->year_of_issue = $this->year_of_issue;
            $contract->color = $this->color;
            $contract->car_state_number = $this->car_state_number;
            $contract->steering_wheel = $this->steering_wheel;
            $contract->licence = $this->licence;
            $contract->licence_number = $this->licence_number;
            $contract->contract_expire = date("Y-m-d H:i:s", strtotime("+6 month"));

            return $contract->save();
        }
    }

    public function getYearsList()
    {
        $currentYear = date('Y');
        $yearFrom = 1990;
        $yearsRange = range($yearFrom, $currentYear);

        return array_combine($yearsRange, $yearsRange);
    }


}