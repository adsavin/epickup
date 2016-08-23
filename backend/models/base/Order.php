<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "order".
 *
 * @property integer $id
 * @property string $order_date
 * @property string $total_amount
 * @property string $status
 * @property integer $shop_branch_id
 * @property integer $member_id
 * @property integer $user_id
 * @property string $process_date
 * @property string $ready_date
 * @property string $sending_date
 * @property string $completed_date
 * @property string $need_delivery
 * @property double $delivery_latitude
 * @property double $delivery_longitude
 *
 * @property \app\models\User $user
 * @property \app\models\Member $member
 * @property \app\models\ShopBranch $shopBranch
 * @property \app\models\OrderDetail[] $orderDetails
 */
class Order extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_date', 'status', 'shop_branch_id', 'member_id', 'user_id', 'need_delivery'], 'required'],
            [['order_date', 'process_date', 'ready_date', 'sending_date', 'completed_date'], 'safe'],
            [['total_amount', 'delivery_latitude', 'delivery_longitude'], 'number'],
            [['status', 'need_delivery'], 'string'],
            [['shop_branch_id', 'member_id', 'user_id'], 'integer']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_date' => Yii::t('app', 'Order Date'),
            'total_amount' => Yii::t('app', 'Total Amount'),
            'status' => Yii::t('app', 'Status'),
            'shop_branch_id' => Yii::t('app', 'Shop Branch ID'),
            'member_id' => Yii::t('app', 'Member ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'process_date' => Yii::t('app', 'Process Date'),
            'ready_date' => Yii::t('app', 'Ready Date'),
            'sending_date' => Yii::t('app', 'Sending Date'),
            'completed_date' => Yii::t('app', 'Completed Date'),
            'need_delivery' => Yii::t('app', 'Need Delivery'),
            'delivery_latitude' => Yii::t('app', 'Delivery Latitude'),
            'delivery_longitude' => Yii::t('app', 'Delivery Longitude'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(\app\models\User::className(), ['id' => 'user_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMember()
    {
        return $this->hasOne(\app\models\Member::className(), ['id' => 'member_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranch()
    {
        return $this->hasOne(\app\models\ShopBranch::className(), ['id' => 'shop_branch_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(\app\models\OrderDetail::className(), ['order_id' => 'id']);
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
     * @return \app\models\OrderQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\OrderQuery(get_called_class());
    }
}
