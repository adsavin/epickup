<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OrderDetail;

/**
 * app\models\OrderDetailSearch represents the model behind the search form about `app\models\OrderDetail`.
 */
 class OrderDetailSearch extends OrderDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'order_id', 'shop_branch_id', 'product_id'], 'integer'],
            [['amount', 'total'], 'number'],
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
        $query = OrderDetail::find();

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
            'order_id' => $this->order_id,
            'shop_branch_id' => $this->shop_branch_id,
            'product_id' => $this->product_id,
            'amount' => $this->amount,
            'total' => $this->total,
        ]);

        return $dataProvider;
    }
}
