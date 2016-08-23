<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDetail */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Order Details'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-detail-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Order Detail').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'order.id',
                'label' => Yii::t('app', 'Order')
            ],
        [
                'attribute' => 'shopBranch.shop_branch_id',
                'label' => Yii::t('app', 'Shop Branch')
            ],
        'product_id',
        'amount',
        'total',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
