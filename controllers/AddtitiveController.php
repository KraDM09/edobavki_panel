<?php

namespace app\controllers;

use app\models\Additive;
use app\models\AddtitiveSearch;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AddtitiveController implements the CRUD actions for Additive model.
 */
class AddtitiveController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Additive models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AddtitiveSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Additive model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Additive model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Additive();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                $res = $model->createAdditive();

                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Additive model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post())) {
            $res = $model->updateAdditive();

            if ($res['code'] != 200) {
                die(json_encode([
                    'status' => 'error',
                    'message' => json_encode($res, JSON_UNESCAPED_UNICODE)
                ]));
            }

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Additive model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete()
    {
        if (Yii::$app->request->isPost) {
            $id = Yii::$app->request->post('id');
            $model = $this->findModelByCode($id);

            $res = $model->deleteAdditive();

            if ($res['code'] != 200) {
                die(json_encode([
                    'status' => 'error',
                    'message' => json_encode($res, JSON_UNESCAPED_UNICODE)
                ]));
            }

            return $this->redirect(['index']);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Additive model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Additive the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Additive::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Finds the Additive model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $code ID
     * @return Additive the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModelByCode($code)
    {
        if (($model = Additive::findOne(['code' => $code])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
