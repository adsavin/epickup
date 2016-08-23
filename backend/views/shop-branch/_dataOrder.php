<?php
use kartik\grid\GridView;
use yii\data\ArrayDataProvider;

    $dataProvider = new ArrayDataProvider([
        'allModels' => $model->orders,
        'key' => 'id'
    ]);
    $gridColumns = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'order_date',
        'total_amount',
        'status',
        [
                'attribute' => 'member.username',
                'label' => Yii::t('app', 'Member')
            ],
        [
                'attribute' => 'user.username',
                'label' => Yii::t('app', 'User')
            ],
        'process_date',
        'ready_date',
        'sending_date',
        'completed_date',
        'need_delivery',
        'delivery_latitude',
        'delivery_longitude',
        [
            'class' => 'yii\grid\ActionColumn',
            'controller' => 'order'
        ],
    ];
    
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => $gridColumns,
        'containerOptions' => ['style' => 'overflow: auto'],
        'pjax' => true,
        'beforeHeader' => [
            [
                'options' => ['class' => 'skip-export']
            ]
        ],
        'export' => [
            'fontAwesome' => true
        ],
        'bordered' => true,
        'striped' => true,
        'condensed' => true,
        'responsive' => true,
        'hover' => true,
        'showPageSummary' => false,
        'persistResize' => false,
    ]);
