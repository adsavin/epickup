<?php

namespace app\models;

use \app\models\base\Unit as BaseUnit;

/**
 * This is the model class for table "unit".
 */
class Unit extends BaseUnit
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['code', 'name'], 'required'],
            [['code'], 'string', 'max' => 45],
            [['name'], 'string', 'max' => 255],
            [['code'], 'unique']
        ]);
    }
	
}
