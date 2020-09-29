<?php

namespace app\controllers;

use Yii;
use app\models\News;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/*
 * Основной контроллер для показа рубрики и новостей
 */
class NewsController extends Controller
{
    public $layout = 'back';

    public function actionIndex($id = null)
    {
        
        if (Yii::$app->request->isPost){
            if($id == null){
                $news = News::find()->select('title, description')->asArray()->all();
                
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'data' => $news,
            ];
            }
            if($id != null ){
                $id = (int) $id;
                $news = News::findOne($id);
                return $this->asJson($news);
            }
        }else{
            $this->render('index');
        }
        
    }
}
