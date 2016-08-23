<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "shop_branch".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $tel
 * @property string $email
 * @property string $opening_time
 * @property string $closing_time
 * @property integer $shop_branch_id
 * @property string $address
 * @property string $active
 * @property double $latitude
 * @property double $longitude
 * @property string $bank_account
 *
 * @property \app\models\Order[] $orders
 * @property \app\models\Shop $shopBranch
 * @property \app\models\ShopBranchHasProduct[] $shopBranchHasProducts
 * @property \app\models\Product[] $products
 */
class ShopBranch extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'tel', 'shop_branch_id'], 'required'],
            [['shop_branch_id'], 'integer'],
            [['address', 'active'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['code', 'bank_account'], 'string', 'max' => 45],
            [['name', 'tel', 'email', 'opening_time', 'closing_time'], 'string', 'max' => 255],
            [['code'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop_branch';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'code' => Yii::t('app', 'Code'),
            'name' => Yii::t('app', 'Name'),
            'tel' => Yii::t('app', 'Tel'),
            'email' => Yii::t('app', 'Email'),
            'opening_time' => Yii::t('app', 'Opening Time'),
            'closing_time' => Yii::t('app', 'Closing Time'),
            'shop_branch_id' => Yii::t('app', 'Shop Branch ID'),
            'address' => Yii::t('app', 'Address'),
            'active' => Yii::t('app', 'Active'),
            'latitude' => Yii::t('app', 'Latitude'),
            'longitude' => Yii::t('app', 'Longitude'),
            'bank_account' => Yii::t('app', 'Bank Account'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(\app\models\Order::className(), ['shop_branch_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranch()
    {
        return $this->hasOne(\app\models\Shop::className(), ['id' => 'shop_branch_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranchHasProducts()
    {
        return $this->hasMany(\app\models\ShopBranchHasProduct::className(), ['shop_branch_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(\app\models\Product::className(), ['id' => 'product_id'])->viaTable('shop_branch_has_product', ['shop_branch_id' => 'id']);
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
     * @return \app\models\ShopBranchQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ShopBranchQuery(get_called_class());
    }
}
