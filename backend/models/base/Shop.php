<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "shop".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property string $logo
 * @property string $created_date
 *
 * @property \app\models\ShopBranch[] $shopBranches
 */
class Shop extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

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
            [['code'], 'unique']
        ];
    }
    
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
        return $this->hasMany(\app\models\ShopBranch::className(), ['shop_branch_id' => 'id']);
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
     * @return \app\models\ShopQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\ShopQuery(get_called_class());
    }
}
