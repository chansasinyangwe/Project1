<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "results".
 *
 * @property int $id
 * @property string|null $score
 * @property string|null $grade
 * @property string|null $comments
 */
class Results extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'results';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['score', 'grade', 'comments'], 'string'],
        [['course_enrollment_id'], 'integer' ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'score' => 'Score',
            'grade' => 'Grade',
            'comments' => 'Comments',
            
        ];
    }
}
