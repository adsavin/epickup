<?php

namespace app\models;

use \app\models\base\Order as BaseOrder;

/**
 * This is the model class for table "order".
 */
class Order extends BaseOrder
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['order_date', 'status', 'shop_branch_id', 'member_id', 'user_id', 'need_delivery'], 'required'],
            [['order_date', 'process_date', 'ready_date', 'sending_date', 'completed_date'], 'safe'],
            [['total_amount', 'delivery_latitude', 'delivery_longitude'], 'number'],
            [['status', 'need_delivery'], 'string'],
            [['shop_branch_id', 'member_id', 'user_id'], 'integer']
        ]);
    }
	
}
