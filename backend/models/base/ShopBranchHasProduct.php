<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "shop_branch_has_product".
 *
 * @property integer $shop_branch_id
 * @property integer $product_id
 * @property string $price
 * @property string $start_date
 * @property string $end_date
 *
 * @property \app\models\OrderDetail[] $orderDetails
 * @property \app\models\Product $product
 * @property \app\models\ShopBranch $shopBranch
 */
class ShopBranchHasProduct extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['shop_branch_id', 'product_id', 'price', 'start_date', 'end_date'], 'required'],
            [['shop_branch_id', 'product_id'], 'integer'],
            [['price'], 'number'],
            [['start_date', 'end_date'], 'safe']
        ];
    }
    
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
        return $this->hasMany(\app\models\OrderDetail::className(), ['shop_branch_id' => 'shop_branch_id', 'product_id' => 'product_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(\app\models\Product::className(), ['id' => 'product_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranch()
    {
        return $this->hasOne(\app\models\ShopBranch::className(), ['id' => 'shop_branch_id']);
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
     * @return \app\models\ShopBranchHasProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ShopBranchHasProductQuery(get_called_class());
    }
}
