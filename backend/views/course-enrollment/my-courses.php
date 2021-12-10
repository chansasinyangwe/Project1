<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'My Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-index">
    
    


<?php // echo $this->render('_search', ['model' => $searchModel]);   ?>
    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">


            </div>
        </div>
        <div class="card-body">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    'name:ntext',
                    'code',
//                    ["attribute" => 'lecturer_id',
//                        "value" => function ($model) {
//               
//                          $name = backend\models\Users::findOne($model->lecturer_id);
//                           return !empty($name)?  $name ->first_name. "  " . $name->last_name:"" ;
//                        }],
                    ['class' => ActionColumn::className(),
                        'options' => ['style' => 'width:20px;'],
                        'template' => '{view}',
                        'buttons' => [
                            'view' => function ($url, $model) {
                                return Html::a(
                                                '<span class="fas fa-eye"></span>', ['my-students', 'id' => $model->id], [
                                            'title' => 'View loan',
                                            'data-toggle' => 'tooltip',
                                            "data-popup" => "tooltip",
                                            'data-placement' => 'top',
                                            'style' => "padding:5px;",
                                            'class' => 'bt btn-lg'
                                                ]
                                );
                            },
                        ]
                    ],
//        [
//            'class' => 'yii\grid\ActionColumn',
//            'contentOptions' => [],
//            'header' => 'Actions',
//            'template' => '{view}',
//            
//            'visibleButtons' => [
//                'view' => function($model) {
//                   return Html::a(
//                                        '<span class="fas fa-eye"></span>', ['my-students', 'id' => $model->id], [
//                                    'title' => 'View loan',
//                                    'data-toggle' => 'tooltip',
//                                   // "data-popup" => "tooltip",
//                                    'data-placement' => 'top',
//                                    'style' => "padding:5px;",
//                                    'class' => 'bt btn-lg'
//                                        ]
//                        );
//                },
//            ]
//        ],
                ],
                    ]
            );
            ?>

        </div>
    </div>



</div>