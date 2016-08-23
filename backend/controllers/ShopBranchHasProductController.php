<?php

namespace backend\controllers;

use Yii;
use app\models\ShopBranchHasProduct;
use app\models\ShopBranchHasProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ShopBranchHasProductController implements the CRUD actions for ShopBranchHasProduct model.
 */
class ShopBranchHasProductController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => \yii\filters\AccessControl::className(),
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view', 'create', 'update', 'delete', 'pdf', 'save-as-new', 'add-order-detail'],
                        'roles' => ['@']
                    ],
                    [
                        'allow' => false
                    ]
                ]
            ]
        ];
    }

    /**
     * Lists all ShopBranchHasProduct models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ShopBranchHasProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single ShopBranchHasProduct model.
     * @param integer $shop_branch_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionView($shop_branch_id, $product_id)
    {
        $model = $this->findModel($shop_branch_id, $product_id);
        $providerOrderDetail = new \yii\data\ArrayDataProvider([
            'allModels' => $model->orderDetails,
        ]);
        return $this->render('view', [
            'model' => $this->findModel($shop_branch_id, $product_id),
            'providerOrderDetail' => $providerOrderDetail,
        ]);
    }

    /**
     * Creates a new ShopBranchHasProduct model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new ShopBranchHasProduct();

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'shop_branch_id' => $model->shop_branch_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing ShopBranchHasProduct model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $shop_branch_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionUpdate($shop_branch_id, $product_id)
    {
        if (Yii::$app->request->post('_asnew') == '1') {
            $model = new ShopBranchHasProduct();
        }else{
            $model = $this->findModel($shop_branch_id, $product_id);
        }

        if ($model->loadAll(Yii::$app->request->post()) && $model->saveAll()) {
            return $this->redirect(['view', 'shop_branch_id' => $model->shop_branch_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ShopBranchHasProduct model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $shop_branch_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionDelete($shop_branch_id, $product_id)
    {
        $this->findModel($shop_branch_id, $product_id)->deleteWithRelated();

        return $this->redirect(['index']);
    }
    
    /**
     * 
     * Export ShopBranchHasProduct information into PDF format.
     * @param integer $shop_branch_id
     * @param integer $product_id
     * @return mixed
     */
    public function actionPdf($shop_branch_id, $product_id) {
        $model = $this->findModel($shop_branch_id, $product_id);
        $providerOrderDetail = new \yii\data\ArrayDataProvider([
            'allModels' => $model->orderDetails,
        ]);

        $content = $this->renderAjax('_pdf', [
            'model' => $model,
            'providerOrderDetail' => $providerOrderDetail,
        ]);

        $pdf = new \kartik\mpdf\Pdf([
            'mode' => \kartik\mpdf\Pdf::MODE_CORE,
            'format' => \kartik\mpdf\Pdf::FORMAT_A4,
            'orientation' => \kartik\mpdf\Pdf::ORIENT_PORTRAIT,
            'destination' => \kartik\mpdf\Pdf::DEST_BROWSER,
            'content' => $content,
            'cssFile' => '@vendor/kartik-v/yii2-mpdf/assets/kv-mpdf-bootstrap.min.css',
            'cssInline' => '.kv-heading-1{font-size:18px}',
            'options' => ['title' => \Yii::$app->name],
            'methods' => [
                'SetHeader' => [\Yii::$app->name],
                'SetFooter' => ['{PAGENO}'],
            ]
        ]);

        return $pdf->render();
    }

    /**
    * Creates a new ShopBranchHasProduct model by another data,
    * so user don't need to input all field from scratch.
    * If creation is successful, the browser will be redirected to the 'view' page.
    *
    * @param type $id
    * @return type
    */
    public function actionSaveAsNew($shop_branch_id, $product_id) {
        $model = new ShopBranchHasProduct();

        if (Yii::$app->request->post('_asnew') != '1') {
            $model = $this->findModel($shop_branch_id, $product_id);
        }
    
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'shop_branch_id' => $model->shop_branch_id, 'product_id' => $model->product_id]);
        } else {
            return $this->render('saveAsNew', [
                'model' => $model,
            ]);
        }
    }
    
    /**
     * Finds the ShopBranchHasProduct model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $shop_branch_id
     * @param integer $product_id
     * @return ShopBranchHasProduct the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($shop_branch_id, $product_id)
    {
        if (($model = ShopBranchHasProduct::findOne(['shop_branch_id' => $shop_branch_id, 'product_id' => $product_id])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
    
    /**
    * Action to load a tabular form grid
    * for OrderDetail
    * @author Yohanes Candrajaya <moo.tensai@gmail.com>
    * @author Jiwantoro Ndaru <jiwanndaru@gmail.com>
    *
    * @return mixed
    */
    public function actionAddOrderDetail()
    {
        if (Yii::$app->request->isAjax) {
            $row = Yii::$app->request->post('OrderDetail');
            if((Yii::$app->request->post('isNewRecord') && Yii::$app->request->post('_action') == 'load' && empty($row)) || Yii::$app->request->post('_action') == 'add')
                $row[] = [];
            return $this->renderAjax('_formOrderDetail', ['row' => $row]);
        } else {
            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }
    }
}
