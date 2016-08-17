<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order_detail".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $shop_branch_id
 * @property integer $product_id
 * @property string $amount
 * @property string $total
 *
 * @property Order $order
 * @property ShopBranchHasProduct $shopBranch
 */
class OrderDetail extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['id', 'order_id', 'shop_branch_id', 'product_id', 'amount', 'total'], 'required'],
            [['id', 'order_id', 'shop_branch_id', 'product_id'], 'integer'],
            [['amount', 'total'], 'number'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Order::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['shop_branch_id', 'product_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopBranchHasProduct::className(), 'targetAttribute' => ['shop_branch_id' => 'shop_branch_id', 'product_id' => 'product_id']],
        ];
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
        return $this->hasOne(Order::className(), ['id' => 'order_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranch()
    {
        return $this->hasOne(ShopBranchHasProduct::className(), ['shop_branch_id' => 'shop_branch_id', 'product_id' => 'product_id']);
    }
}
