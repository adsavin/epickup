<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

?>
<div class="member-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->username) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email:email',
        'birthdate',
        'tel',
        'register_date',
        'status',
        'picture',
        'address:ntext',
        'latitude',
        'longitude',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>