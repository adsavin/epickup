<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use rmrevin\yii\fontawesome\FA;

$this->title = 'Signup';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-2x fa-star"></i>
                    <h1 style="display: inline"><?= Html::encode($this->title) ?></h1>
                </div>
                <div class="panel-body">
                    <p>Please fill out the following fields to signup:</p>
                    <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'email') ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <div class="form-group">
                        <?= Html::submitButton('Signup', ['class' => 'btn btn-success col-md-12  btn-lg', 'name' => 'signup-button']) ?>
                        <?=
                        yii\authclient\widgets\AuthChoice::widget([
                            'baseAuthUrl' => ['site/auth']
                        ])
                        ?>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="col-sm-12 text-center" style="height: 40px;">OR</div>
                    <div class="col-sm-12">
<?= Html::submitButton(FA::icon(FA::_FACEBOOK), ['class' => 'btn btn-primary col-sm-12 btn-lg', 'name' => 'signup-button']) ?>
                    </div>
                    <div class="col-sm-12" style="height: 40px;"></div>
                    <hr>
                    <div class="col-sm-12">
                    <?= Html::submitButton(FA::icon(FA::_GOOGLE_PLUS), ['class' => 'btn btn-danger col-sm-12 btn-lg', 'name' => 'signup-button']) ?>
                    </div>
<?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
</div>
