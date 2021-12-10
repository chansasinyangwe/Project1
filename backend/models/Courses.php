<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $name
 * @property int|null $code
 * @property int|null $lecturer_id
 *
 * @property CourseEnrollment[] $courseEnrollments
 * @property Lecturer $lecturer
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name','code'], 'string'],
            [['lecturer_id'], 'integer'],
          // [['lecturer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Lecturer::className(), 'targetAttribute' => ['lecturer_id' => 'id']],
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
            'code' => 'Code',
            'lecturer_id' => 'Lecturer',
        ];
    }

    /**
     * Gets query for [[CourseEnrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseEnrollments()
    {
        return $this->hasMany(CourseEnrollment::className(), ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Lecturer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getLecturer()
    {
        return $this->hasOne(Lecturer::className(), ['id' => 'lecturer_id']);
    }
}
