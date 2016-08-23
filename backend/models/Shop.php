<?php

namespace app\models;

use \app\models\base\Shop as BaseShop;

/**
 * This is the model class for table "shop".
 */
class Shop extends BaseShop
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['code', 'name', 'logo', 'created_date'], 'required'],
            [['created_date'], 'safe'],
            [['code'], 'string', 'max' => 45],
            [['name', 'logo'], 'string', 'max' => 255],
            [['code'], 'unique']
        ]);
    }
	
}
