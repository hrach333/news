<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "rubric".
 *
 * @property int $id
 * @property string $name
 * @property string|null $alias
 * @property int|null $child
 * @property string|null $data_create
 *
 * @property NewsRubric[] $newsRubrics
 * @property News[] $news
 */
class Rubric extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rubric';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['child'], 'integer'],
            [['data_create'], 'safe'],
            [['name', 'alias'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'alias' => 'Alias',
            'child' => 'Child',
            'data_create' => 'Data Create',
        ];
    }

    /**
     * Gets query for [[NewsRubrics]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNewsRubrics()
    {
        return $this->hasMany(NewsRubric::class, ['rubric_id' => 'id']);
    }

    /**
     * Gets query for [[News]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNews()
    {
        return $this->hasMany(News::class, ['id' => 'news_id'])->viaTable('news_rubric', ['rubric_id' => 'id']);
    }
}
