<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deliveries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="delivery-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Delivery').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'min_distance',
        'max_distance',
        'price',
        'start_date',
        'end_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>
