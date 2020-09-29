<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;



AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!doctype html>
<html lang="<?= Yii::$app->language ?>">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="author" content="">
    <title><?= Html::encode($this->title) ?></title>
    <!-- Bootstrap core CSS -->
    

    <!-- Custom styles for this template -->
    <?php $this->head() ?>
</head>

<body>
    <?php $this->beginBody() ?>
    <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">News</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="#">Sign out</a>
            </li>
        </ul>
    </nav>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">

                        <!--<li class="nav-item">
                        <a class="nav-link active" href="#">
                            <span data-feather="home"></span>
                            Dashboard <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <span data-feather="file"></span>
                            Orders
                        </a>
                    </li>-->
                        
                    </ul>

                    <!--<h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">
                    <span>Saved reports</span>
                    <a class="d-flex align-items-center text-muted" href="#">
                        <span data-feather="plus-circle"></span>
                    </a>
                </h6>-->

                </div>
            </nav>

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 pt-3 px-4">
                
                <?= $content ?>
            </main>
        </div>
    </div>

    <!-- Bootstrap core JavaScript
================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    


    <?php $this->endBody() ?>
    <script>
    
        $.ajax({
            type: "post",
            url: "/rubric/1",
            data: "_csrf=<?= Yii::$app->request->getCsrfToken() ?>",
            success: function(json) {

                var content = $(".content");
                //console.log(json);
                var n = 0;
                var html = '';
                html += '<table>';
                html += '<tr><th>Загаловок</th><th>Описание</th></tr>';
                for (var i = 0; i < json.length; i++) {
                    
                            if(Array.isArray(json[i])){
                                while(n < json[i].length){
                                    
                                    html += '<tr><td><h3>' + json[i][n].title + '</h3></td><td><p>' + json[i][n].description + '</p></td></tr>';
                                    
                                n++;
                                }
                                
                                
                            }else{
                                content.append('<tr>');
                                //console.log(json[i].title);
                            html += '<tr><td><h3>' + json[i].title + '</h3></td><td><p>' + json[i].description + '</p></td></tr>';
                            
                            }                  
                            
                            
                        }
                html += '</table>';
                content.html(html);
                
            }
        })
        
    </script>
</body>

</html>
<?php $this->endPage() ?>