<?php

namespace app\controllers;

use yii\web\Controller;


class CityLifeController extends Controller
{
    //возврошаем основной вид весь код в фронте
    
    public function actionIndex()
    {
        return $this->render('index');
    }
}