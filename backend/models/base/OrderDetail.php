<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "order_detail".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $shop_branch_id
 * @property integer $product_id
 * @property string $amount
 * @property string $total
 *
 * @property \app\models\Order $order
 * @property \app\models\ShopBranchHasProduct $shopBranch
 */
class OrderDetail extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'shop_branch_id', 'product_id', 'amount', 'total'], 'required'],
            [['order_id', 'shop_branch_id', 'product_id'], 'integer'],
            [['amount', 'total'], 'number']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'order_detail';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'order_id' => Yii::t('app', 'Order ID'),
            'shop_branch_id' => Yii::t('app', 'Shop Branch ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'amount' => Yii::t('app', 'Amount'),
            'total' => Yii::t('app', 'Total'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(\app\models\Order::className(), ['id' => 'order_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranch()
    {
        return $this->hasOne(\app\models\ShopBranchHasProduct::className(), ['shop_branch_id' => 'shop_branch_id', 'product_id' => 'product_id']);
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
     * @return \app\models\OrderDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\OrderDetailQuery(get_called_class());
    }
}
