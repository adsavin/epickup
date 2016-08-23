<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Order;

/**
 * app\models\OrderSearch represents the model behind the search form about `app\models\Order`.
 */
 class OrderSearch extends Order
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'shop_branch_id', 'member_id', 'user_id'], 'integer'],
            [['order_date', 'status', 'process_date', 'ready_date', 'sending_date', 'completed_date', 'need_delivery'], 'safe'],
            [['total_amount', 'delivery_latitude', 'delivery_longitude'], 'number'],
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
        $query = Order::find();

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
            'order_date' => $this->order_date,
            'total_amount' => $this->total_amount,
            'shop_branch_id' => $this->shop_branch_id,
            'member_id' => $this->member_id,
            'user_id' => $this->user_id,
            'process_date' => $this->process_date,
            'ready_date' => $this->ready_date,
            'sending_date' => $this->sending_date,
            'completed_date' => $this->completed_date,
            'delivery_latitude' => $this->delivery_latitude,
            'delivery_longitude' => $this->delivery_longitude,
        ]);

        $query->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'need_delivery', $this->need_delivery]);

        return $dataProvider;
    }
}
