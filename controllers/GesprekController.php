<?php

namespace app\controllers;

use Yii;
use app\models\Gesprek;
use app\models\GesprekSearch;
use app\models\Rolspeler;
use app\models\GesprekSoort;
use app\models\Examen;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\data\Pagination;
use yii\app;

use yii\filters\AccessControl;

/**
 * GesprekController implements the CRUD actions for Gesprek model.
 */
class GesprekController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
      return [
        'access' => [
        'class' => AccessControl::className(),

        'rules' => [
              // when logged in, any user
              [ 'actions' => ['index','view','create'],
                'allow' => true,
                'roles' => ['@']
              ],
              // only role == admin
              [ 'actions' => ['update','delete','overzicht'],
                'allow' => true,
                'roles' => ['@'],
                'matchCallback' => function ($rule, $action)
                {
                  return (Yii::$app->user->identity->role == 'admin');
                }
              ],

           ],

         ],
      ];
    }

    /**
     * Lists all Gesprek models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new GesprekSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionOverzicht() {

      //$role = Yii::$app->user->identity->role;

      //d($role);

      //if ($role != 'axdmin') {
      //  return $this->redirect('site/login');
      //}

      $this->view->title = 'Status Gesprekken';
      $query = gesprek::find();

      $pagination = new Pagination([
          'defaultPageSize' => 20,
          'totalCount' => $query->count(),
      ]);

      $gesprekken = $query->orderBy('status')
          ->offset($pagination->offset)
          ->limit($pagination->limit)
          ->all();

      return $this->render('overzicht', [
          'gesprekken' => $gesprekken,
          'pagination' => $pagination,
      ]);
    }

    /**
     * Displays a single Gesprek model.
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
     * Creates a new Gesprek model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Gesprek();


        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        $rolspelerList=[];
        // get ass. Array met array[id]="naam rolspeler", to be used for drop-down
        $rolSpelers = rolspeler::findAll(['actief' => '1']);
        foreach($rolSpelers as $item) {
          $rolspelerList[$item['id']] = $item['naam'];
        }

        [$examen, $gesprekkenList] = $this->getGesprekkenList();

        // dd($gesprekkenList);

        return $this->render('create', [
            'model' => $model,
            'rolspelerList' => $rolspelerList,
            'gesprekkenList' => $gesprekkenList,
            'examen' => $examen,
        ]);
    }

    private function getGesprekkenList() {
      // get firstactive examen (order by datum_van ASC) - get active exam...?
      // and get linked examen-gesprekken
      $examen = examen::find()->where(['actief' => '1'])->orderBy(['datum_van' => 'SORT_DESC'])->one();

      $gesprekken = gesprekSoort::find()->where([ 'examen_id' => $examen['id'] ])->joinWith('examenGesprekSoorts')->all();

      $gesprekkenList=[];
      foreach($gesprekken as $item) {
        $gesprekkenList[$item['id']] = $item['kerntaak_nr'].".".$item['gesprek_nr']." : ".
                $item['kerntaak_naam']." ".$item['gesprek_naam'];
      }
      return [$examen, $gesprekkenList];
    }

    /**
     * Updates an existing Gesprek model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        [$examen, $gesprekkenList] = $this->getGesprekkenList();

        return $this->render('update', [
            'model' => $model,
            'gesprekkenList' => $gesprekkenList,
            'examen'=> $examen,
        ]);
    }

    /**
     * Deletes an existing Gesprek model.
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
     * Finds the Gesprek model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Gesprek the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Gesprek::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionUpdateRegel($id, $rolspeler, $status){
        //d($_GET);

        $sql="update gesprek set rolspeler_id=:rolspeler, status=:status where id=:id";
        $params = array(':id'=> $id, ':rolspeler' => $rolspeler, ':status' => $status );
        Yii::$app->db->createCommand($sql)->bindValues($params)->execute();

        $this->redirect('/gesprek/overzicht');
    }
}
