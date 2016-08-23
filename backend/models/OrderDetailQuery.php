<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[OrderDetail]].
 *
 * @see OrderDetail
 */
class OrderDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return OrderDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return OrderDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}