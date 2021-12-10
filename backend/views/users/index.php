<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="users-index">

    <p>
        <?= Html::a('Create Users', ['create'], ['class' => 'btn btn-success btn-sm']) ?>
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
                    'first_name:ntext',
                    'last_name:ntext',
                    //'role_id',
                    //'auth_Key',
                    //'password:ntext',
                    //'password_reset_token',
                    //'status',
                    //'last_login',
                    //'verification_token',
                    'username',
                    'email:email',
//                    'role_id',
                    ["attribute" => 'role_id',
                        "value" => function ($model) {
                            return backend\models\Roles::findOne($model->role_id)->name;
                        }],
                    ['class' => 'yii\grid\ActionColumn'],
                ],
            ]);
            ?>



        </div>
    </div>

</div>
