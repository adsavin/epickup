<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "member".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 * @property string $birthdate
 * @property string $tel
 * @property string $register_date
 * @property string $status
 * @property string $picture
 * @property string $address
 * @property double $latitude
 * @property double $longitude
 *
 * @property \app\models\Order[] $orders
 */
class Member extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email', 'birthdate', 'register_date', 'status', 'picture'], 'required'],
            [['birthdate', 'register_date'], 'safe'],
            [['status', 'address'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['username', 'tel'], 'string', 'max' => 45],
            [['email', 'picture'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'birthdate' => Yii::t('app', 'Birthdate'),
            'tel' => Yii::t('app', 'Tel'),
            'register_date' => Yii::t('app', 'Register Date'),
            'status' => Yii::t('app', 'Status'),
            'picture' => Yii::t('app', 'Picture'),
            'address' => Yii::t('app', 'Address'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(\app\models\Order::className(), ['member_id' => 'id']);
    }
    
/**
     * @inheritdoc
     * @return array mixed
     */ 
    public function behaviors()
    {
        return [
            'uuid' => [
                'class' => UUIDBehavior::className(),
                'column' => 'id',
            ],
        ];
    }

    /**
     * @inheritdoc
     * @return \app\models\MemberQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\MemberQuery(get_called_class());
    }
}
