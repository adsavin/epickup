<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopBranchHasProduct]].
 *
 * @see ShopBranchHasProduct
 */
class ShopBranchHasProductQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ShopBranchHasProduct[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopBranchHasProduct|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}