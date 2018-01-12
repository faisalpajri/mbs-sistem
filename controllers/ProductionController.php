<?php

namespace app\controllers;

use Yii;
use app\models\Production;
use app\models\Container;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProductionController implements the CRUD actions for Production model.
 */
class ProductionController extends Controller
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
     * Lists all Production models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Production::find(),
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Production model.
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
     * Creates a new Production model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Production();

        if ($model->load(Yii::$app->request->post())) {

            $container = Container::find()->where(['no_seri' => $model->no_seri_kontainer])->one();
            $model->tipe_kontainer = $container->tipe;

            if($model->save()) {
                if($model->status == 2){
                  $container->status = 4;
                }
                else {
                  $container->status = 3;
                }
              $container->update();
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Production model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $old_container =  Container::find()->where(['no_seri' => $model->no_seri_kontainer])->one();

        if ($model->load(Yii::$app->request->post())) {

          $container = Container::find()->where(['no_seri' => $model->no_seri_kontainer])->one();
          $model->tipe_kontainer = $container->tipe;


          if($model->save()) {
              $container->status = ($model->status == 2) ? 4 : 3 ;
              // if($model->status == 2){
              //   $container->status = 4;
              // }
              // else {
              //   $container->status = 3;
              // }

              $container->update();

              if ($old_container->no_seri != $container->no_seri) {
                  $old_container->status = 2;
                  $old_container->update();
              }
          }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Production model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);

        if ($model->delete()) {
            $old_container =  Container::find()->where(['no_seri' => $model->no_seri_kontainer])->one();
            $old_container->status = 2;
            $old_container->update();
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Production model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Production the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Production::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
