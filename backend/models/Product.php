<?php

namespace app\models;

use \app\models\base\Product as BaseProduct;

/**
 * This is the model class for table "product".
 */
class Product extends BaseProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['code', 'name', 'unit_id'], 'required'],
            [['description', 'active'], 'string'],
            [['unit_id'], 'integer'],
            [['code'], 'string', 'max' => 100],
            [['name', 'logo'], 'string', 'max' => 255],
            [['code'], 'unique'],
            [['name'], 'unique']
        ]);
    }
	
}
