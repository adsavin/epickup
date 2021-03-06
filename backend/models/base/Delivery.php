<?php

namespace app\models\base;

use Yii;
use mootensai\behaviors\UUIDBehavior;

/**
 * This is the base model class for table "delivery".
 *
 * @property integer $id
 * @property double $min_distance
 * @property double $max_distance
 * @property string $price
 * @property string $start_date
 * @property string $end_date
 */
class Delivery extends \yii\db\ActiveRecord
{
    use \mootensai\relation\RelationTrait;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['min_distance', 'max_distance'], 'required'],
            [['min_distance', 'max_distance', 'price'], 'number'],
            [['start_date', 'end_date'], 'safe'],
            [['min_distance'], 'unique'],
            [['max_distance'], 'unique']
        ];
    }
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'delivery';
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'min_distance' => Yii::t('app', 'Min Distance'),
            'max_distance' => Yii::t('app', 'Max Distance'),
            'price' => Yii::t('app', 'Price'),
            'start_date' => Yii::t('app', 'Start Date'),
            'end_date' => Yii::t('app', 'End Date'),
        ];
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
     * @return \app\models\DeliveryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \app\models\DeliveryQuery(get_called_class());
    }
}
