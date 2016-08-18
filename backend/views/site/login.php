<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <div class="row">
        <div class="col-lg-6 col-lg-offset-3">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-sm-1 hidden-xs"><i class="fa fa-lock fa-5x"></i></div>
                        <div class="col-sm-11">
                            <div class="col-sm-12 title">
                                <?= Html::encode($this->title) ?>
                            </div>
                            <div class="col-sm-12">
                                Please fill out the following fields to login
                            </div>
                        </div>
                    </div>
                </div>
                <div class="panel-body">

                    <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox() ?>
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary btn-lg col-xs-12', 'name' => 'login-button']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
