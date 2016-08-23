<?php

namespace app\models;

use \app\models\base\Delivery as BaseDelivery;

/**
 * This is the model class for table "delivery".
 */
class Delivery extends BaseDelivery
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['min_distance', 'max_distance'], 'required'],
            [['min_distance', 'max_distance', 'price'], 'number'],
            [['start_date', 'end_date'], 'safe'],
            [['min_distance'], 'unique'],
            [['max_distance'], 'unique']
        ]);
    }
	
}
