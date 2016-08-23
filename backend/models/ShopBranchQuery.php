<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ShopBranch]].
 *
 * @see ShopBranch
 */
class ShopBranchQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        $this->andWhere('[[status]]=1');
        return $this;
    }*/

    /**
     * @inheritdoc
     * @return ShopBranch[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ShopBranch|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}