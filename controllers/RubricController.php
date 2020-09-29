<?php

namespace app\controllers;



use app\models\Rubric;
use Yii;


class RubricController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        if (Yii::$app->request->isPost) {
            $csrf_param = Yii::$app->request->post('csrf_param');
            $id = (int) $id;
            $rubric = Rubric::findOne($id);
            $news = $rubric->news;
            if ($rubric->child == 0) {
                $sql = 'SELECT * FROM rubric WHERE child=:id';
                $rubricsChild = Rubric::findBySql($sql, ['id' => $rubric->id])->all();
                foreach ($rubricsChild as $item) {
                    $childRubric = Rubric::findOne($item->id);
                    
                    $nextKey = count($news);
                    $news[$nextKey] = $childRubric->getNews()->all();
                }
            }
            
            return $this->asJson($news);
        } 
    }
    /**
     * Возрощает многомерный массив для древовидного создание меню
     */
    public function actionGetAllRubric()
    {
        if (Yii::$app->request->isPost) {
            $navRubric = Rubric::find()->select('id,name,child')->asArray()->all();
            //print_r($navRubric);

            $treeRubric = $this->createTree($navRubric);
            $response = Yii::$app->response;
            $response->format = \yii\web\Response::FORMAT_JSON;
            $response->data = $treeRubric;
        }
    }

    /**
     * Создание древовидно структуры массива
     * @return array
     */
    private function createTree($arr)
    {
        $parents_arr = array();
        foreach ($arr as $key => $item) {
            $parents_arr[$item['child']][$item['id']] = $item;
        }

        $treeElem = $parents_arr[0];
        $this->generateTree($treeElem, $parents_arr);

        return $treeElem;
    }
    /**
     * Формирование дочерных элементов
     */
    private function generateTree(&$treeElem, $parents_arr)
    {
        foreach ($treeElem as $key => $item) {
            if (!isset($item['children'])) {
                $treeElem[$key]['children'] = array();
            }
            if (array_key_exists($key, $parents_arr)) {
                $treeElem[$key]['children'] = $parents_arr[$key];
                $this->generateTree($treeElem[$key]['children'], $parents_arr);
            }
        }
    }
}
