<?php

namespace app\controllers;

use Yii;
use app\models\SellingOrder;
use app\models\Production;
use app\models\Container;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SellingOrderController implements the CRUD actions for SellingOrder model.
 */
class SellingOrderController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all SellingOrder models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => SellingOrder::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SellingOrder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SellingOrder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new SellingOrder();

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id' => $model->id]);
        // }

        if ($model->load(Yii::$app->request->post())) {
            $production = Production::find()->where(['no_seri_kontainer' => $model->no_seri])->one();
            if($production) {
              $model->no_spk = $production->no_spk;
              $model->proyek = $production->proyek;
              $model->no_po = $production->no_po;
              $model->pemesan = $production->pemesan;
              $model->tanggal_pesan = $production->order_date;
              $model->biaya_produksi = $production->container->ammount + $production->realisasi_material + $production->biaya_pengerjaan;
              $model->tipe_container = $production->container->tipe;
              $model->tipe_barang = $production->tipe_product;
            }else {
                $container = Container::find()->where(['no_seri' => $model->no_seri])->one();
                $model->tipe_container = $container->tipe;
                $model->tipe_barang = 0;
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }

        // elseif ($model->load(Yii::$app->request->post('submit'))) {
        //     if ($model->save()) {
        //         return $this->redirect(['view', 'id' => $model->id]);
        //     }
        // }

        return $this->renderAjax('_form_init', [
            'model' => $model,
        ]);
    }

    public function actionSelling()
    {
      $model = new SellingOrder();

      if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $container = Container::find()->where(['no_seri' => $model->no_seri])->one();
            if ($container) {
                $container->status = 5;
                $container->update();
            }
          return $this->redirect(['view', 'id' => $model->id]);
      }
    }

    /**
     * Updates an existing SellingOrder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()){

            $container = Container::find()->where(['no_seri' => $model->no_seri])->one();
            if ($container) {
                $container->status = 5;
                $container->update();
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SellingOrder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the SellingOrder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return SellingOrder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SellingOrder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
