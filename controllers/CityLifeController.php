<?php

namespace app\controllers;

use yii\web\Controller;


class CityLifeController extends Controller
{
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}