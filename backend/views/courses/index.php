<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CoursesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Courses';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="courses-index">


    <p>
        <?= Html::a('Create Courses', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
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
                    'id',
                    'name:ntext',
                    'code',
                    
                   
                    ["attribute" => 'lecturer_id',
                        "value" => function ($model) {
               
                          $name = backend\models\Users::findOne($model->lecturer_id);
                           return !empty($name)?  $name ->first_name. "  " . $name->last_name:"" ;
                        }],
                                
                   
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>

        </div>
    </div>



</div>
