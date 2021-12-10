<?php

namespace backend\controllers;

use backend\models\CourseEnrollment;
use backend\models\CourseEnrollmentSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Courses;
use yii;
use yii\data\ArrayDataProvider;
use yii\helpers\Json;
use backend\models\Results;

/**
 * CourseEnrollmentController implements the CRUD actions for CourseEnrollment model.
 */
class CourseEnrollmentController extends Controller {

    /**
     * @inheritDoc
     */
    public function behaviors() {
        return array_merge(
                parent::behaviors(),
                [
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
     * Lists all CourseEnrollment models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new CourseEnrollmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CourseEnrollment model.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new CourseEnrollment model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new CourseEnrollment();
        $model->scenario = 'onSubmit';

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                if ($model->save()) {
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
                    'model' => $model,
        ]);
    }

    /**
     * Updates an existing CourseEnrollment model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
                    'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CourseEnrollment model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the CourseEnrollment model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return CourseEnrollment the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = CourseEnrollment::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionMyCourses() {
//        $searchModel = new CourseEnrollmentSearch();
//        $dataProvider = $searchModel->search($this->request->queryParams);


        $myCoursesModel = \backend\models\Courses::find()
                ->where(['lecturer_id' => Yii::$app->user->id])
                ->all();




        $dataProvider = new ArrayDataProvider(["allModels" => $myCoursesModel]);

        return $this->render('my-courses', [
//                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionMyStudents($id) {
        $searchModel = new CourseEnrollmentSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        $dataProvider->query->andFilterWhere(['course_id' => $id]);
        // $model =CourseEnrollment::findOne(["course_id"=>$id]);
//        $myStudentsModel = \backend\models\CourseEnrollment::find()
//                ->where(['course_id' => $id])
//                ->all();
//
//        $studentIdArray = [];
//        if (!empty($myStudentsModel)) {
//
//            foreach ($myStudentsModel as $student) {
//
//                array_push($studentIdArray, $student["student_id"]);
//            }
//        }
//        $myCourseEnrollment = \backend\models\Students::find()
//                ->where(["IN", "id", $studentIdArray])
//                ->all();
//
//        $dataProvider = new ArrayDataProvider(["allModels" => $myCourseEnrollment]);


        if (Yii::$app->request->post('hasEditable')) {
            $Id = Yii::$app->request->post('editableKey');
            $model = CourseEnrollment::findOne($Id);
            $out = Json::encode(['output' => '', 'message' => '']);
            $posted = current($_POST['CourseEnrollment']);
            $post = ['CourseEnrollment' => $posted];
            $oldScore = $model->score;
            $oldComment = $model->comments;

            if ($model->load($post)) {

                if ($model->score > 80) {
                    $model->grade = "A+";
                } 
                if ($model->score <= 80 && $model->score > 70) {
                    $model->grade = "A";
                } 
                if ($model->score <= 70 && $model->score > 60) {
                    $model->grade = "B+";
                } 
                if ($model->score <= 50 && $model->score > 0) {
                    $model->grade = "C+";
                } if($model->score==0) {
                    $model->grade = "D";
                }

                $message = '';
                if (!$model->save()) {
                    foreach ($model->getErrors() as $error) {
                        $message .= $error[0];
                    }
                    $output = $message;
                }
                $output = '';
                $out = Json::encode(['output' => $output, 'message' => $message]);
            }
            return $out;
        }


        return $this->render('my-students', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
                    'id' => $id,
        ]);
    }
    
     public function actionPublishResults($id){
        $model = CourseEnrollment::find()
                ->where(['course_id' => $id])->all();
         if(!empty($model)){
             foreach ($model as $results) {
                 $grade = CourseEnrollment::findOne(['id' => $results -> id ]);
                
                 $results -> status = 1;
                 
                  $results->save();
                  
                
             }
              
         }
         
              return $this->redirect(['my-students', 'id' => $id]);
         
        
     }

}
