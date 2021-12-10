<?php
/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\bootstrap4\Nav;
use yii\bootstrap4\NavBar;

AppAsset::register($this);

$username = Yii::$app->user->identity->username;
$role_id = Yii::$app->user->identity->role_id;
$role_name = backend\models\Roles::findOne($role_id)->name;
$role_name = !empty($role_name) ? $role_name : "";
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body class="hold-transition sidebar-mini">
        <div class="wrapper">
            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                    </li>

                </ul>

                <!-- Right navbar links -->
                <ul class="navbar-nav ml-auto">
                    <!-- Navbar Search -->
                    <li class="nav-item">
                        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                            <i class="fas fa-search"></i>
                        </a>
                        <div class="navbar-search-block">
                            <form class="form-inline">
                                <div class="input-group input-group-sm">
                                    <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-navbar" type="submit">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- Messages Dropdown Menu -->

                    <!-- Notifications Dropdown Menu -->
                    <li class="nav-item dropdown">
                        <a class="nav-link" data-toggle="dropdown" href="#">


                            <?php
                            echo $username;
                            ?>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">

                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-envelope mr-2"></i> 4 new messages

                            </a>
                            <div class="dropdown-divider"></div>
                            <a href="#" class="dropdown-item">
                                <i class="fas fa-users mr-2"></i> 8 friend requests

                            </a>
                            <div class="dropdown-divider"></div>



                            <?=
                            Html::a('<i class="fas fa-power-off mr-2"></i> Logout', ['site/logout'], ['class' => 'dropdown-item'
                                , "data" => [
                                    "method" => "post"
                        ]])
                            ?>




                </ul>
            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">


                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->


                    <!-- SidebarSearch Form -->
                    <div class="form-inline">
                        <div class="input-group" data-widget="sidebar-search">
                            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-sidebar">
                                    <i class="fas fa-search fa-fw"></i>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                            <!-- Add icons to the links using the .nav-icon class
                                 with font-awesome or any other icon font library -->


                            <li class="nav-item">
                                <?php
                                if (Yii::$app->controller->id == "site" && Yii::$app->controller->action->id == "index") {
                                    echo Html::a(' <i class="nav-icon fas fa-home"></i>
              <p>
                Home
               
              </p>', ['site/index'], ['class' => 'nav-link active'
                                            ,
                                    ]);
                                } else {

                                    echo Html::a(' <i class="nav-icon fas fa-home"></i>
              <p>
                Home
               
              </p>', ['site/index'], ['class' => 'nav-link'
                                            ,
                                    ]);
                                }
                                ?>
                            </li>



                            <!--                            <li class="nav-item">
                            <?php
                            // role table
//                                if (strtolower($role_name) == "admin") {
//                                    if (Yii::$app->controller->id == "roles" &&
//                                            (Yii::$app->controller->action->id == "index" ||
//                                            Yii::$app->controller->action->id == "view" ||
//                                            Yii::$app->controller->action->id == "create" ||
//                                            Yii::$app->controller->action->id == "update" )) {
//                                        echo Html::a(' <i class="nav-icon fas fa-address-book"></i>
//              <p>
//                Roles
//               
//              </p>', ['roles/index'], ['class' => 'nav-link active'
//                                            , "data" => [
//                                        ]]);
//                                    } else {
//                                        echo Html::a(' <i class="nav-icon fas fa-address-book"></i>
//              <p>
//                Roles
//               
//              </p>', ['roles/index'], ['class' => 'nav-link'
//                                            , "data" => [
//                                        ]]);
//                                    }
//                                }
                            ?>
                                                        </li>-->

                            <li class="nav-item">


                                <?php
                                //users table
                                if (Yii::$app->user->identity->role_id == 1) {
                                    if (Yii::$app->controller->id == "users" &&
                                            (Yii::$app->controller->action->id == "index" ||
                                            Yii::$app->controller->action->id == "view" ||
                                            Yii::$app->controller->action->id == "create" ||
                                            Yii::$app->controller->action->id == "update" )) {
                                        echo Html::a(' <i class="nav-icon fas fa-users"></i>
              <p>
                Users
               
              </p>', ['users/index'], ['class' => 'nav-link active'
                                                ,
                                        ]);
                                    } else {

                                        echo Html::a(' <i class="nav-icon fas fa-users"></i>
              <p>
                Users
               
              </p>', ['users/index'], ['class' => 'nav-link'
                                                ,
                                        ]);
                                    }
                                }
                                ?>


                            </li>

                            <li class="nav-item">


                                <?php
                                //schools table
                                if (Yii::$app->user->identity->role_id == 1) {
                                    if (Yii::$app->controller->id == "schools" &&
                                            (Yii::$app->controller->action->id == "index" ||
                                            Yii::$app->controller->action->id == "view" ||
                                            Yii::$app->controller->action->id == "create" ||
                                            Yii::$app->controller->action->id == "update" )) {
                                        echo Html::a(' <i class="nav-icon fas fa-school"></i>
              <p>
                Schools
               
              </p>', ['schools/index'], ['class' => 'nav-link active'
                                                ,
                                        ]);
                                    } else {

                                        echo Html::a(' <i class="nav-icon fas fa-school"></i>
              <p>
                Schools
               
              </p>', ['schools/index'], ['class' => 'nav-link'
                                                ,
                                        ]);
                                    }
                                }
                                ?>


                            </li>

                            <li class="nav-item">


                                <?php
                                //department table
                                if (Yii::$app->user->identity->role_id == 1) {
                                    if (Yii::$app->controller->id == "department" &&
                                            (Yii::$app->controller->action->id == "index" ||
                                            Yii::$app->controller->action->id == "view" ||
                                            Yii::$app->controller->action->id == "create" ||
                                            Yii::$app->controller->action->id == "update" )) {
                                        echo Html::a(' <i class="nav-icon fas fa-address-card"></i>
              <p>
                Department
               
              </p>', ['department/index'], ['class' => 'nav-link active'
                                                ,
                                        ]);
                                    } else {

                                        echo Html::a(' <i class="nav-icon fas fa-address-card"></i>
              <p>
                Department
               
              </p>', ['department/index'], ['class' => 'nav-link'
                                                ,
                                        ]);
                                    }
                                }
                                ?>


                            </li>

                            <li class="nav-item">


                                <?php
                                //student table
                                if (Yii::$app->user->identity->role_id == 1) {
                                    if (Yii::$app->controller->id == "students" &&
                                            (Yii::$app->controller->action->id == "index" ||
                                            Yii::$app->controller->action->id == "view" ||
                                            Yii::$app->controller->action->id == "create" ||
                                            Yii::$app->controller->action->id == "update" )) {
                                        echo Html::a(' <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Students
               
              </p>', ['students/index'], ['class' => 'nav-link active'
                                                ,
                                        ]);
                                    } else {

                                        echo Html::a(' <i class="nav-icon fas fa-user-graduate"></i>
              <p>
                Students
               
              </p>', ['students/index'], ['class' => 'nav-link'
                                                ,
                                        ]);
                                    }
                                }
                                ?>


                            </li>

                            <li class="nav-item">


                                <?php
//courses table
                                if (Yii::$app->user->identity->role_id == 1) {
                                    if (Yii::$app->controller->id == "courses" &&
                                            (Yii::$app->controller->action->id == "index" ||
                                            Yii::$app->controller->action->id == "view" ||
                                            Yii::$app->controller->action->id == "create" ||
                                            Yii::$app->controller->action->id == "update" )) {
                                        echo Html::a(' <i class="nav-icon fas fa-book"></i>
              <p>
                Courses
               
              </p>', ['courses/index'], ['class' => 'nav-link active'
                                                ,
                                        ]);
                                    } else {

                                        echo Html::a(' <i class="nav-icon fas fa-book"></i>
              <p>
                Courses
               
              </p>', ['courses/index'], ['class' => 'nav-link'
                                                ,
                                        ]);
                                    }
                                }
                                ?>


                            </li>

                            <li class="nav-item">


                                <?php
                                //results table
                                if (Yii::$app->user->identity->role_id == 2) {
                                    if (Yii::$app->controller->id == "results" &&
                                            (Yii::$app->controller->action->id == "index" ||
                                            Yii::$app->controller->action->id == "view" ||
                                            Yii::$app->controller->action->id == "create" ||
                                            Yii::$app->controller->action->id == "update" )) {
                                        echo Html::a(' <i class="nav-icon fas fa-book-open"></i>
              <p>
                Results
               
              </p>', ['results/index'], ['class' => 'nav-link active'
                                                ,
                                        ]);
                                    } else {

                                        echo Html::a(' <i class="nav-icon fas fa-book-open"></i>
              <p>
                Results
               
              </p>', ['results/index'], ['class' => 'nav-link'
                                                ,
                                        ]);
                                    }
                                }
                                ?>


                            </li>

                            <li class="nav-item">


                                <?php
                                //course enrollment2 table
                                if (Yii::$app->user->identity->role_id == 1) {
                                    if (Yii::$app->controller->id == "course-enrollment" &&
                                            (Yii::$app->controller->action->id == "index" ||
                                            Yii::$app->controller->action->id == "view" ||
                                            Yii::$app->controller->action->id == "my-students" ||
                                            Yii::$app->controller->action->id == "create" ||
                                            Yii::$app->controller->action->id == "update" )) {
                                        echo Html::a(' <i class="nav-icon fas fa-user-plus"></i>
              <p>
                Course Enrollment
               
              </p>', ['course-enrollment/index'], ['class' => 'nav-link active'
                                                ,
                                        ]);
                                    } else {

                                        echo Html::a(' <i class="nav-icon fas fa-user-plus"></i>
              <p>
                 Course Enrollment
               

              </p>', ['course-enrollment/index'], ['class' => 'nav-link'
                                                ,
                                        ]);
                                    }
                                }
                                ?>


                            </li>

                            <li class="nav-item">


                                <?php
                                //My course table
                                if (Yii::$app->user->identity->role_id == 2) {
                                    if (Yii::$app->controller->id == "course-enrollment" &&
                                            Yii::$app->controller->action->id == "my-courses" ||
                                            Yii::$app->controller->action->id == "my-students"
                                    ) {
                                        echo Html::a(' <i class="nav-icon fas fa-user-plus"></i>
              <p>
               My Courses
               
              </p>', ['course-enrollment/my-courses'], ['class' => 'nav-link active'
                                                ,
                                        ]);
                                    } else {

                                        echo Html::a(' <i class="nav-icon fas fa-user-plus"></i>
              <p>
               My Course
               
              </p>', ['course-enrollment/my-courses'], ['class' => 'nav-link'
                                                ,
                                        ]);
                                    }
                                }
                                ?>


                            </li>


                            <!--
                            <li class="nav-item">
                            
                            
                            <?php
                            //lecturer table
//                                if (Yii::$app->controller->id == "lecturer" &&
//                                        (Yii::$app->controller->action->id == "index" ||
//                                        Yii::$app->controller->action->id == "view" ||
//                                        Yii::$app->controller->action->id == "create" ||
//                                        Yii::$app->controller->action->id == "update" )) {
//                                    echo Html::a(' <i class="nav-icon fas fa-chalkboard-teacher"></i>
//              <p>
//                Lecturer
//               
//              </p>', ['lecturer/index'], ['class' => 'nav-link active'
//                                            ,
//                                    ]);
//                                } else {
//
//                                    echo Html::a(' <i class="nav-icon fas fa-chalkboard-teacher"></i>
//              <p>
//                Lecturer
//               
//              </p>', ['lecturer/index'], ['class' => 'nav-link'
//                                            ,
//                                    ]);
//                                }
                            ?>
                    </nav>
                            <!-- /.sidebar-menu -->
                            </div>
                            <!-- /.sidebar -->
                            </aside>

                            <!-- Content Wrapper. Contains page content -->
                            <div class="content-wrapper">
                                <!-- Content Header (Page header) -->
                                <div class="content-header">
                                    <div class="container-fluid">

                                        <?=
                                        Breadcrumbs::widget([
                                            "homeLink" => [
                                                "label" => "Home", "class" => "text-success", "url" => Yii::$app->getHomeUrl() . "site/index"
                                            ],
                                            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                                        ])
                                        ?><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </div>
                                <!-- /.content-header -->

                                <!-- Main content -->
                                <div class="content">
                                    <div class="container-fluid">

                                        <?= $content ?>

                                    </div>
                                    <!-- /.container-fluid -->
                                </div>
                                <!-- /.content -->
                            </div>
                            <!-- /.content-wrapper -->

                            <!-- Control Sidebar -->
                            <aside class="control-sidebar control-sidebar-dark">
                                <!-- Control sidebar content goes here -->
                            </aside>
                            <!-- /.control-sidebar -->

                            <!-- Main Footer -->
                            <footer class="main-footer">
                                <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong>
                                All rights reserved.
                                <div class="float-right d-none d-sm-inline-block">
                                    <b>Version</b> 3.1.0
                                </div>
                            </footer>
                            </div>


                            <?php $this->endBody() ?>
                            </body>
                            </html>
                            <?php
                            $this->endPage();
                            