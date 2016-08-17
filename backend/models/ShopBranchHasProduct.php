<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop_branch_has_product".
 *
 * @property integer $shop_branch_id
 * @property integer $product_id
 * @property string $price
 * @property string $start_date
 * @property string $end_date
 *
 * @property OrderDetail[] $orderDetails
 * @property Product $product
 * @property ShopBranch $shopBranch
 */
class ShopBranchHasProduct extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_branch_has_product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_branch_id', 'product_id', 'price', 'start_date', 'end_date'], 'required'],
            [['shop_branch_id', 'product_id'], 'integer'],
            [['price'], 'number'],
            [['start_date', 'end_date'], 'safe'],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            [['shop_branch_id'], 'exist', 'skipOnError' => true, 'targetClass' => ShopBranch::className(), 'targetAttribute' => ['shop_branch_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'shop_branch_id' => Yii::t('app', 'Shop Branch ID'),
            'product_id' => Yii::t('app', 'Product ID'),
            'price' => Yii::t('app', 'Price'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrderDetails()
    {
        return $this->hasMany(OrderDetail::className(), ['shop_branch_id' => 'shop_branch_id', 'product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranch()
    {
        return $this->hasOne(ShopBranch::className(), ['id' => 'shop_branch_id']);
    }
}
