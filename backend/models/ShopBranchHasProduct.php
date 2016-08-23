<?php

namespace app\models;

use \app\models\base\ShopBranchHasProduct as BaseShopBranchHasProduct;

/**
 * This is the model class for table "shop_branch_has_product".
 */
class ShopBranchHasProduct extends BaseShopBranchHasProduct
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['shop_branch_id', 'product_id', 'price', 'start_date', 'end_date'], 'required'],
            [['shop_branch_id', 'product_id'], 'integer'],
            [['price'], 'number'],
            [['start_date', 'end_date'], 'safe']
        ]);
    }
	
}
