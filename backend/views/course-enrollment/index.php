<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CourseEnrollmentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Course Enrollments';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="course-enrollment-index">



    <p>
        <?= Html::a('Create Course Enrollment', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">


            </div>
        </div>
        <div class="card-body">

            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    //'id',
                    //'academic_year',
                   // 'term',
                   // 'student_id',
                     ["attribute" => 'student_id',
                        "value" => function ($model) {
                            return backend\models\Students::findOne($model->student_id)->first_name;
                        }],
                   // 'course_id',
                     ["attribute" => 'course_id',
                        "value" => function ($model) {
                            return backend\models\Courses::findOne($model->course_id)->name;
                        }],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>
        </div>
    </div>
</div>
