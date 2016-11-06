<?php

namespace app\controllers;

use Yii;
use app\models\Usuario;
use app\models\UsuarioBusca;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UsuarioController implements the CRUD actions for Usuario model.
 */
class UsuarioController extends Controller
{
    public $layout = 'backend';

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

    public function beforeAction($event)
    {
        if(Yii::$app->user->isGuest){
            return $this->redirect('/site/index')->send();
        }
        return parent::beforeAction($event);
    }

    /**
     * Lists all Usuario models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsuarioBusca();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'admin' => Yii::$app->user->identity->admin,
        ]);
    }

    /**
     * Displays a single Usuario model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Usuario model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        if(!Yii::$app->user->identity->admin){
            $this->goHome();
        }

        $model = new Usuario();

        if ($model->load(Yii::$app->request->post())) {
            $model->authKey = md5(time());
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            $model->latitude = 0;
            $model->longitude = 0;
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Usuario model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        if(!Yii::$app->user->identity->admin && Yii::$app->user->identity->id != $id){
            $this->goHome();
        }
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Usuario model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        if(!Yii::$app->user->identity->admin || Yii::$app->user->identity->id == $id){
            $this->goHome();
        }

        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionRota(){
        if(!Yii::$app->user->identity->admin){
            //$this->goHome();
        }

        $usuarios = Usuario::find()->select('firstName, lastName, latitude, longitude, admin')
            ->where(['!=', 'latitude', '0'])
            ->andWhere(['!=', 'longitude', '0'])
            ->andWhere(['admin' => 0])
            ->limit(10)
            ->all();

        return $this->render('rota', [
            'usuarios' => $usuarios
        ]);
    }

    /**
     * Finds the Usuario model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Usuario the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Usuario::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionPainel(){
        return $this->render('painel');
    }
}
