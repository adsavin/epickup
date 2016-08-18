<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
use common\models\User;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Users');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]);  ?>

    <p>
        <?= Html::a(Yii::t('app', 'Create User'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php Pjax::begin(); ?>    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'username',
//            'auth_key',
//            'password_hash',
//            'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
                'format' => 'html',
                'filter' => [User::STATUS_ACTIVE => "Active", User::STATUS_DELETED => "Delete"],
                'value' => function($data) {
            switch ($data->status) {
                case User::STATUS_ACTIVE:
                    return "<span class='label label-success'><i class='fa fa-check'></i> Active</span>";
                case User::STATUS_DELETED:
                    return "<span class='label label-danger'><i class='fa fa-trash'></i> Delete</span>";
            }
        }
            ],
            [
                'attribute' => 'created_at',
                'value' => function($data) {
                    return date("d/m/Y", $data->created_at);
                }
            ],
            // 'updated_at',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
    <?php Pjax::end(); ?></div>
