<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use backend\models\CourseEnrollmentSearch;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Students */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="students-view">



    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">


            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-lg-6">
                    
                     <?=
                DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        // 'id',
                        'first_name:ntext',
                        'last_name:ntext',
                        // 'authKey',
                        // 'password:ntext',
                        //'password_reset_token',
                        ["attribute" => 'department_id',
                            "value" => function ($model) {
                                return backend\models\Department::findOne($model->department_id)->name;
                            }],
                        'computer_number',
                    ],
                ])
                ?>
                </div>

                <div class="col-lg-6">
                    <?php
                    echo GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],
                            // 'id',
                            //'academic_year',
                            // 'term',
                            // 'student_id',
//                    ["attribute" => 'student_id',
//                        "value" => function ($model) {
//                            return backend\models\Students::findOne($model->student_id)->first_name;
//                        }],
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

    </div>
</div>
