<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use kartik\grid\ActionColumn;
use kartik\grid\EditableColumn;
use kartik\popover\PopoverX;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$name = backend\models\Courses::findOne($id);
$readOnly = true;
?>
<div class="students-index">



    <h1><?= Html::encode($name->name) ?></h1>

    <p>
        <?= Html::a('Publish Results', ['publish-results', 'id' => $id], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]);    ?>


    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">


            </div>
        </div>
        <div class="card-body col-lg-12">
            <?=
            GridView::widget([
                'dataProvider' => $dataProvider,
                //'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    // 'id',
                    // 'first_name:ntext',
                    [
                        "attribute" => 'name',
                        "value" => function ($model) {

                            $name = backend\models\Students::findOne($model->student_id);
                            return !empty($name) ? $name->first_name . "  " . $name->last_name : "";
                        }
                    ],
                    [
                        // 'options' => ['style' => 'width:350px;'],
                        'class' => EditableColumn::className(),
                        'enableSorting' => true,
                        'attribute' => 'score',
                        'refreshGrid' => true,
                        'value' => function($model) {
                            return !empty($model->score) ? $model->score . "%" : "";
                        },
                        'readonly' => function($model) {
                            //return false;
                            if ($model->academic_year === date('Y')) {
                                if($model->status===1){
                                    return true;
                                }
                                else{
                                    return false;
                                };
                            } else {
                                if($model->status===1){
                                    return true;
                                }
                                else{
                                    return false;
                                };
                            }
                        },
                        'editableOptions' => [
                            'asPopover' => false,
                        // 'type' => 'primary',
                        // 'size' => PopoverX::SIZE_MEDIUM,
                        ],
                    ],
                    [
                        // 'options' => ['style' => 'width:350px;'],
                        'class' => EditableColumn::className(),
                        'enableSorting' => true,
                        'attribute' => 'comments',
                        'refreshGrid' => true,
                        'readonly' => function($model) {

                            if ($model->academic_year === date('Y')) {
                               if($model->status===1){
                                    return true;
                                }
                                 else{
                                    return false;
                                };
                            }else {
                                if($model->status===1){
                                    return true;
                                }
                                else{
                                    return false;
                            }};
                        },
                        'editableOptions' => [
                            'asPopover' => true,
                            // 'type' => 'primary',
                            'size' => PopoverX::SIZE_MEDIUM,
                        ],
                    ],
                    // 'last_name:ntext',
                    'grade',
                    [
                        "attribute" => 'status',
                        "value" => function ($model) {

                            if ($model->status === 1) {
                                return 'published';
                            } else {
                                return 'unpublished';
                            }
                        }
                    ]
                //'password_reset_token',
//            ["attribute" => 'department_id',
//                "value" => function ($model) {
//                    return backend\models\Department::findOne($model->department_id)->name;
//                }],
                //  'computer_number',
//            ['class' => ActionColumn::className(),
//                        'options' => ['style' => 'width:20px;'],
//                        'template' => '{view}',
//                        'buttons' => [
//                            'view' => function ($url, $model) {
//                                return Html::a(
//                                                '<span class="fas fa-eye"></span>', ['my-students', 'id' => $model->id], [
//                                            'title' => 'View loan',
//                                            'data-toggle' => 'tooltip',
//                                            "data-popup" => "tooltip",
//                                            'data-placement' => 'top',
//                                            'style' => "padding:5px;",
//                                            'class' => 'bt btn-lg'
//                                                ]
//                                );
//                            },
//                        ]
//                    ],
                ],
            ]);
            ?>

        </div>
    </div>



</div>
<?php
$this->registerCss('.popover-x {display:none}');
?>