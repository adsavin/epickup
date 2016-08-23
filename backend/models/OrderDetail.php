<?php

namespace app\models;

use \app\models\base\OrderDetail as BaseOrderDetail;

/**
 * This is the model class for table "order_detail".
 */
class OrderDetail extends BaseOrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['order_id', 'shop_branch_id', 'product_id', 'amount', 'total'], 'required'],
            [['order_id', 'shop_branch_id', 'product_id'], 'integer'],
            [['amount', 'total'], 'number']
        ]);
    }
	
}
