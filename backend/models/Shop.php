<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "shop".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $logo
 * @property string $created_date
 *
 * @property ShopBranch[] $shopBranches
 */
class Shop extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shop';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['code', 'name', 'logo', 'created_date'], 'required'],
            [['created_date'], 'safe'],
            [['code'], 'string', 'max' => 45],
            [['name', 'logo'], 'string', 'max' => 255],
            [['code'], 'unique'],
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
            'logo' => Yii::t('app', 'Logo'),
            'created_date' => Yii::t('app', 'Created Date'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getShopBranches()
    {
        return $this->hasMany(ShopBranch::className(), ['shop_branch_id' => 'id']);
    }
}
