<?php

namespace app\models;

use \app\models\base\ShopBranch as BaseShopBranch;

/**
 * This is the model class for table "shop_branch".
 */
class ShopBranch extends BaseShopBranch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['code', 'name', 'tel', 'shop_branch_id'], 'required'],
            [['shop_branch_id'], 'integer'],
            [['address', 'active'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['code', 'bank_account'], 'string', 'max' => 45],
            [['name', 'tel', 'email', 'opening_time', 'closing_time'], 'string', 'max' => 255],
            [['code'], 'unique']
        ]);
    }
	
}
