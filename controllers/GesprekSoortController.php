<?php

namespace app\controllers;

use Yii;
use app\models\GesprekSoort;
use app\models\gesprek;
use app\models\GesprekSoortSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * GesprekSoortController implements the CRUD actions for GesprekSoort model.
 */
class GesprekSoortController extends Controller
{
    public function init() {
        if (! isset(yii::$app->user->identity->role) || Yii::$app->user->identity->role != 'admin') {
            $this->redirect(['/site/login']);
        }
    }
      
    /**
     * {@inheritdoc}
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
     * Lists all GesprekSoort models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GesprekSoortSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        //$dataProvider = $searchModel->search(['sort' => 'kerntaak_naam']);
        //dd(($dataProvider));

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single GesprekSoort model.
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
     * Creates a new GesprekSoort model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new GesprekSoort();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing GesprekSoort model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing GesprekSoort model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id, $confirm='')
    {   
        // zijn er gesprekken gekoppeld?
        $count=gesprek::find()->where(['gesprek_soort_id' => $id])->count();

        // als er gesprekken zijn gekoppeld en ik heb nog geen confirmatie dan vraag om confirmatie
        if ( $count and ! $confirm) {
            $this->view->title = 'Bevestig delete'; // waarom werkt dit niet?
            return $this->render('confirm', [
                'model' => $this->findModel($id),
                'count' => $count,
            ]);
        } else {
            $this->findModel($id)->delete();
            return $this->redirect(['index']);
        }
        
    }

    /**
     * Finds the GesprekSoort model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return GesprekSoort the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = GesprekSoort::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionCopy($id)
    {
      $sql="insert into gesprek_soort
        (SELECT NULL,0, kerntaak_naam, gesprek_nr+1, gesprek_naam
        FROM gesprek_soort WHERE id = :id)";
      $data = Yii::$app->db->createCommand($sql);
      $data->bindParam(":id", $id);
      $data->execute();
      $sql="select max(id) id from gesprek_soort";
      $data = Yii::$app->db->createCommand($sql);
      $newId = $data->queryOne();
      return $this->redirect(['index']);
    }

}
