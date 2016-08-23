<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ShopBranch;

/**
 * app\models\ShopBranchSearch represents the model behind the search form about `app\models\ShopBranch`.
 */
 class ShopBranchSearch extends ShopBranch
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shop_branch_id'], 'integer'],
            [['code', 'name', 'tel', 'email', 'opening_time', 'closing_time', 'address', 'active', 'bank_account'], 'safe'],
            [['latitude', 'longitude'], 'number'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ShopBranch::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'shop_branch_id' => $this->shop_branch_id,
            'latitude' => $this->latitude,
            'longitude' => $this->longitude,
        ]);

        $query->andFilterWhere(['like', 'code', $this->code])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'tel', $this->tel])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'opening_time', $this->opening_time])
            ->andFilterWhere(['like', 'closing_time', $this->closing_time])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'active', $this->active])
            ->andFilterWhere(['like', 'bank_account', $this->bank_account]);

        return $dataProvider;
    }
}
