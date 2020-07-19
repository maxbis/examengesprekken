<?php

namespace app\controllers;

use Yii;
use app\models\Examen;
use app\models\ExamenSearch;
use app\models\GesprekSoort;
use app\models\ExamenGesprekSoort;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ExamenController implements the CRUD actions for Examen model.
 */
class ExamenController extends Controller
{
    public function init() {
        if (Yii::$app->user->identity->role != 'admin') {
            $this->redirect('/gesprek/create');
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
     * Lists all Examen models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ExamenSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        // actief examen
        $examen = examen::find()->where(['actief' => '1'])->orderBy(['datum_van' => 'SORT_DESC'])->one();

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'examen' => $examen,
        ]);
    }

    /**
     * Displays a single Examen model.
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
     * Creates a new Examen model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Examen();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Examen model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {

          $sql="delete from examen_gesprek_soort where examen_id = :examenid";
          $params = array(':examenid'=> $id);
          Yii::$app->db->createCommand($sql)->bindValues($params)->execute();

          if(!empty($_POST['checkbox'])) {
            foreach($_POST['checkbox'] as $value) {
              $sql="insert into examen_gesprek_soort (examen_id, gesprek_soort_id) values(:examenid, :gesprekid)";
              $params = array(':examenid'=> $id, ':gesprekid' => $value );
              Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
            }
          }

          return $this->redirect(['index']);
        }

        // all gespreksoorten to be viewed in update examen screen in order to bind them to examen
        $gesprekSoort = gesprekSoort::find()->all();
        $gesprekSoortChecked = examenGesprekSoort::findAll(['examen_id' => $id]);

        $gesprekCheckedArray=[];
        foreach ($gesprekSoortChecked as $item) {
          $gesprekCheckedArray[] = $item['gesprek_soort_id'];
        }

        // var_dump($gesprekSoortChecked);

        // ATTENTION, when added please add in update as well: update is a wrapper for _form !!
        return $this->render('update', [
            'model' => $model,
            'gesprek' => $gesprekSoort,
            'gesprekChecked' => $gesprekCheckedArray,
        ]);

    }

    /**
     * Deletes an existing Examen model.
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
     * Finds the Examen model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Examen the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Examen::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionToggleActief($id) {
        // function toggles boolean actief
        $sql="update examen set actief=1 where id = :id; update examen set actief=0 where id != :id;";
        $params = array(':id'=> $id);
        Yii::$app->db->createCommand($sql)->bindValues($params)->execute();
        return $this->redirect(['/examen/index']);
    }

}
