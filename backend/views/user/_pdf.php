<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'User').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'auth_key',
        'password_hash',
        'password_reset_token',
        'email:email',
        'status',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerOrder->totalCount){
    $gridColumnOrder = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'order_date',
        'total_amount',
        'status',
        [
                'attribute' => 'shopBranch.name',
                'label' => Yii::t('app', 'Shop Branch')
            ],
        [
                'attribute' => 'member.username',
                'label' => Yii::t('app', 'Member')
            ],
                'process_date',
        'ready_date',
        'sending_date',
        'completed_date',
        'need_delivery',
        'delivery_latitude',
        'delivery_longitude',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrder,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Order')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnOrder
    ]);
}
?>
    </div>
</div>
