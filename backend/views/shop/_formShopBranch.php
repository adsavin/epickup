<div class="form-group" id="add-shop-branch">
<?php
use kartik\grid\GridView;
use kartik\builder\TabularForm;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\Pjax;

$dataProvider = new ArrayDataProvider([
    'allModels' => $row,
    'pagination' => [
        'pageSize' => -1
    ]
]);
echo TabularForm::widget([
    'dataProvider' => $dataProvider,
    'formName' => 'ShopBranch',
    'checkboxColumn' => false,
    'actionColumn' => false,
    'attributeDefaults' => [
        'type' => TabularForm::INPUT_TEXT,
    ],
    'attributes' => [
        "id" => ['type' => TabularForm::INPUT_HIDDEN, 'visible' => false],
        'code' => ['type' => TabularForm::INPUT_TEXT],
        'name' => ['type' => TabularForm::INPUT_TEXT],
        'tel' => ['type' => TabularForm::INPUT_TEXT],
        'email' => ['type' => TabularForm::INPUT_TEXT],
        'opening_time' => ['type' => TabularForm::INPUT_TEXT],
        'closing_time' => ['type' => TabularForm::INPUT_TEXT],
        'address' => ['type' => TabularForm::INPUT_TEXTAREA],
        'active' => ['type' => TabularForm::INPUT_DROPDOWN_LIST,
                    'items' => [ 'Y' => 'Y', 'N' => 'N', ],
                    'options' => [
                        'columnOptions' => ['width' => '185px'],
                        'options' => ['placeholder' => Yii::t('app', 'Choose Active')],
                    ]
        ],
        'latitude' => ['type' => TabularForm::INPUT_TEXT],
        'longitude' => ['type' => TabularForm::INPUT_TEXT],
        'bank_account' => ['type' => TabularForm::INPUT_TEXT],
        'del' => [
            'type' => 'raw',
            'label' => '',
            'value' => function($model, $key) {
                return Html::a('<i class="glyphicon glyphicon-trash"></i>', '#', ['title' =>  Yii::t('app', 'Delete'), 'onClick' => 'delRowShopBranch(' . $key . '); return false;', 'id' => 'shop-branch-del-btn']);
            },
        ],
    ],
    'gridSettings' => [
        'panel' => [
            'heading' => false,
            'type' => GridView::TYPE_DEFAULT,
            'before' => false,
            'footer' => false,
            'after' => Html::button('<i class="glyphicon glyphicon-plus"></i>' . Yii::t('app', 'Add Shop Branch'), ['type' => 'button', 'class' => 'btn btn-success kv-batch-create', 'onClick' => 'addRowShopBranch()']),
        ]
    ]
]);
echo  "    </div>\n\n";
?>

