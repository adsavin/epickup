<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

\mootensai\components\JsBlock::widget(['viewFile' => '_script', 'pos' => \yii\web\View::POS_END,
    'viewParams' => [
        'class' => 'ShopBranchHasProduct',
        'relID' => 'shop-branch-has-product',
        'value' => \yii\helpers\Json::encode($model->shopBranchHasProducts),
        'isNewRecord' => ($model->isNewRecord) ? 1 : 0
    ]
]);
?>

<div class="product-form">

    <?php
    $form = ActiveForm::begin([
                'options' => ['enctype' => 'multipart/form-data']
    ]);
    ?>

<?= $form->errorSummary($model); ?>

    <div class="row">
        <div class="col-sm-12">
            <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

            <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'placeholder' => 'Code']) ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>
        </div>
        <div class="col-sm-12">
            <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>
        </div>
        <div class="col-sm-4">
            <?=
            $form->field($model, 'unit_id')->widget(\kartik\widgets\Select2::classname(), [
                'data' => \yii\helpers\ArrayHelper::map(\app\models\Unit::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
                'options' => ['placeholder' => Yii::t('app', 'Choose Unit')],
                'pluginOptions' => [
                    'allowClear' => true
                ],
            ]);
            ?>
        </div>
        <div class="col-sm-4">
            <?= $form->field($model, 'active')->dropDownList([ 'Y' => 'Y', 'N' => 'N',], ['prompt' => '']) ?>
        </div>
        <div class="col-sm-4">
            <?php
            echo $form->field($model, 'logo')->widget(FileInput::classname(), [
                'options' => ['accept' => 'image/*'],
            ]);
            ?>
        </div>
    </div>


    <?php
    $forms = [
        [
            'label' => '<i class="glyphicon glyphicon-book"></i> ' . Html::encode(Yii::t('app', 'ShopBranchHasProduct')),
            'content' => $this->render('_formShopBranchHasProduct', [
                'row' => \yii\helpers\ArrayHelper::toArray($model->shopBranchHasProducts),
            ]),
        ],
    ];
    echo kartik\tabs\TabsX::widget([
        'items' => $forms,
        'position' => kartik\tabs\TabsX::POS_ABOVE,
        'encodeLabels' => false,
        'pluginOptions' => [
            'bordered' => true,
            'sideways' => true,
            'enableCache' => false,
        ],
    ]);
    ?>
    <div class="form-group">
        <?php if (Yii::$app->controller->action->id != 'save-as-new'): ?>
            <?=
            Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord
                            ? 'btn btn-success' : 'btn btn-primary'])
            ?>
        <?php endif; ?>
        <?php if (Yii::$app->controller->action->id != 'create'): ?>
            <?= Html::submitButton(Yii::t('app', 'Save As New'), ['class' => 'btn btn-info', 'value' => '1', 'name' => '_asnew']) ?>
<?php endif; ?>
    <?= Html::a(Yii::t('app', 'Cancel'), Yii::$app->request->referrer, ['class' => 'btn btn-danger']) ?>
    </div>

<?php ActiveForm::end(); ?>

</div>
