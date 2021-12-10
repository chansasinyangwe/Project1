<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="users-view">

   

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary btn-sm']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger btn-sm',
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
           // 'id',
            'first_name:ntext',
            'last_name:ntext',
           // 'role_id',
           // 'auth_Key',
           // 'password:ntext',
            //'password_reset_token',
            'status',
            //'last_login',
           // 'verification_token',
            'username',
            'email:email',
            
            ["attribute" => 'role_id',
                "value" => function ($model) {
                    return \backend\models\Roles::findOne($model->role_id)->name;
                }],
        ],
              
              
    ])
        
        
        ?>
        </div>
    </div>
</div>
