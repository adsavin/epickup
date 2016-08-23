<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "product".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property integer $unit_id
 * @property string $active
 * @property string $logo
 *
 * @property \app\models\Unit $unit
 * @property \app\models\ShopBranchHasProduct[] $shopBranchHasProducts
 * @property \app\models\ShopBranch[] $shopBranches
 */
class Product extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'unit_id'], 'required'],
            [['description', 'active'], 'string'],
            [['unit_id'], 'integer'],
            [['code'], 'string', 'max' => 100],
            [['name', 'logo'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['name'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
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
            'description' => Yii::t('app', 'Description'),
            'unit_id' => Yii::t('app', 'Unit ID'),
            'active' => Yii::t('app', 'Active'),
            'logo' => Yii::t('app', 'Logo'),
        ];
    }
    
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUnit()
    {
        return $this->hasOne(\app\models\Unit::className(), ['id' => 'unit_id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranchHasProducts()
    {
        return $this->hasMany(\app\models\ShopBranchHasProduct::className(), ['product_id' => 'id']);
    }
        
    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranches()
    {
        return $this->hasMany(\app\models\ShopBranch::className(), ['id' => 'shop_branch_id'])->viaTable('shop_branch_has_product', ['product_id' => 'id']);
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
     * @return \app\models\ProductQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ProductQuery(get_called_class());
    }
}
