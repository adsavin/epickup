<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Delivery]].
 *
 * @see Delivery
 */
class DeliveryQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return Delivery[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Delivery|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}