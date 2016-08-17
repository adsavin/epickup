<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $description
 * @property integer $unit_id
 * @property string $active
 * @property string $logo
 *
 * @property Unit $unit
 * @property ShopBranchHasProduct[] $shopBranchHasProducts
 * @property ShopBranch[] $shopBranches
 */
class Product extends \yii\db\ActiveRecord
{
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
    public function rules()
    {
        return [
            [['code', 'name', 'unit_id'], 'required'],
            [['description', 'active'], 'string'],
            [['unit_id'], 'integer'],
            [['code'], 'string', 'max' => 100],
            [['name', 'logo'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['name'], 'unique'],
            [['unit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Unit::className(), 'targetAttribute' => ['unit_id' => 'id']],
        ];
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
        return $this->hasOne(Unit::className(), ['id' => 'unit_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranchHasProducts()
    {
        return $this->hasMany(ShopBranchHasProduct::className(), ['product_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranches()
    {
        return $this->hasMany(ShopBranch::className(), ['id' => 'shop_branch_id'])->viaTable('shop_branch_has_product', ['product_id' => 'id']);
    }
}
