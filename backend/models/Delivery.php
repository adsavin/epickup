<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "delivery".
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
    public function rules()
    {
        return [
            [['id', 'min_distance', 'max_distance'], 'required'],
            [['id'], 'integer'],
            [['min_distance', 'max_distance', 'price'], 'number'],
            [['start_date', 'end_date'], 'safe'],
            [['min_distance'], 'unique'],
            [['max_distance'], 'unique'],
        ];
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
}
