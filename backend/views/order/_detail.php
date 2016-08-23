<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

?>
<div class="order-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->id) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'order_date',
        'total_amount',
        'status',
        [
            'attribute' => 'shopBranch.name',
            'label' => Yii::t('app', 'Shop Branch'),
        ],
        [
            'attribute' => 'member.username',
            'label' => Yii::t('app', 'Member'),
        ],
        [
            'attribute' => 'user.username',
            'label' => Yii::t('app', 'User'),
        ],
        'process_date',
        'ready_date',
        'sending_date',
        'completed_date',
        'need_delivery',
        'delivery_latitude',
        'delivery_longitude',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>