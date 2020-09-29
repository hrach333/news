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

    /**
     * Экшн получет все новости, а если есть в запросе id, 
     * то возврошает один новость.
     */
    public function actionIndex($id = null)
    {
        
        if (Yii::$app->request->isPost){
            //Если нет id то выполняем выборку по всему новостям
            if($id == null){
                $news = News::find()->select('title, description')->asArray()->all();
                
                Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'data' => $news,
            ];
            }
            //Если есть id то ищем по id результат из бд
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
