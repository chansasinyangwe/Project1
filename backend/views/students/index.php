<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\StudentsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="students-index">

   

    <p>
        <?= Html::a('Create Students', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    
      <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                
          
            </div>
        </div>
        <div class="card-body">
     <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

           // 'id',
            'first_name:ntext',
            'last_name:ntext',
           // 'authKey',
           //'password:ntext',
            //'password_reset_token',
            ["attribute" => 'department_id',
                "value" => function ($model) {
                    return backend\models\Department::findOne($model->department_id)->name;
                }],
            'computer_number',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
            
        </div>
    </div>
   


</div>
