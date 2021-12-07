<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $fullname
 * @property int $role
 * @property int|null $status
 */
class UserModel extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }
    public $tempPassword;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'fullname', 'role'], 'required'],
            [['role', 'status'], 'integer'],
            [['username', 'password', 'fullname'], 'string', 'max' => 255],
            [['tempPassword'],'safe']
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
            'fullname' => 'Full name',
            'role' => 'User role',
            'status' => 'Status',
            'tempPassword'=>'Temporary password'
        ];
    }


    /*satuvchilarning umumiy savdo summasini chbiqarish, moderator uchun*/

    public function salesMenSales($user_id)
    {
        $fromDated = date('01');
        $fromDatm = date('m');
        $fromDatey = date('Y');

        $toDated = date('t');
        $toDatem = date('m');
        $toDatey = date('Y');

        $start =mktime('0','0','0',$fromDatm,$fromDated,$fromDatey);
        $end =mktime('23','59','59',$toDatem,$toDated,$toDatey);

        $sales = Sales::find()
            ->where(['between','time',$start,$end])
            ->andWhere(['accountant_confirm'=>10])
            ->andWhere(['salesman'=>$user_id])
            ->all();
        foreach ($sales as $sale) {
            $overallSumma +=$sale->price_id*$sale->quantity;
        }
        return $overallSumma;
    }

    /*sotuvchilarning dokon uchun keltirgan foydasi*/

    public function salesMenBenefits($user_id)
    {

        $fromDated = date('01');
        $fromDatm = date('m');
        $fromDatey = date('Y');

        $toDated = date('t');
        $toDatem = date('m');
        $toDatey = date('Y');

        $start =mktime('0','0','0',$fromDatm,$fromDated,$fromDatey);
        $end =mktime('23','59','59',$toDatem,$toDated,$toDatey);

        $sales = Sales::find()
            ->where(['between','time',$start,$end])
            ->andWhere(['accountant_confirm'=>10])
            ->andWhere(['salesman'=>$user_id])
            ->all();
        foreach ($sales as $sale) {
            $hisoblanganSumma +=$sale->price->price*$sale->quantity;
            $sotilganSumma +=$sale->price_id*$sale->quantity;
        }
        return $sotilganSumma-$hisoblanganSumma;

    }


    public function getRoleName()
    {
        return $this->hasOne(Roles::className(), ['id' => 'role']);   //city_state_id is field of city
    }

}
