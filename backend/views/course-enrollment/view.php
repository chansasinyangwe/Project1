<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\CourseEnrollment */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Course Enrollments', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

?>
<div class="course-enrollment-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                
          
            </div>
        </div>
        <div class="card-body">
       <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'academic_year',
            'term',
           // 'student_id',
             ["attribute" => 'student_id',
                        "value" => function ($model) {
               
                          $name = backend\models\Students::findOne($model->student_id);
                           return !empty($name)?  $name ->first_name. "  " . $name->last_name:"" ;
                        }],
           // 'course_id',
                          ["attribute" => 'course_id',
                "value" => function ($model) {
                    return backend\models\Courses::findOne($model->course_id)->name;
                }],
        ],
    ]) ?>
        </div>
    </div>

   

</div>
