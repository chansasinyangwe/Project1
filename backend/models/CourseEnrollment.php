<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "course_enrollment".
 *
 * @property int $id
 * @property string $academic_year
 * @property string $term
 * @property int|null $student_id
 * @property int|null $course_id
 *
 * @property Courses $course
 * @property Students $student
 */
class CourseEnrollment extends \yii\db\ActiveRecord {
  
    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return 'course_enrollment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['academic_year', 'term'], 'required'],
            [['student_id', 'course_id'], 'integer'],
            [['score'], 'number'],
            [['academic_year', 'term',"grade","comments"], 'string', 'max' => 45],
            ['student_id', 'unique', 'when' => function($model) {
                    return $model->isAttributeChanged('student_id') && !empty(self::findOne(['student_id' => $model->student_id,
                                        "course_id" => $model->course_id,
                                        "academic_year" => $model->academic_year,]));
                }, 'message' => 'This student has already been enrolled in this course.'],
            ['student_id', 'studentsCourses', 'on' => 'onSubmit'],
            [['course_id'], 'exist', 'skipOnError' => true, 'targetClass' => Courses::className(), 'targetAttribute' => ['course_id' => 'id']],
            [['student_id'], 'exist', 'skipOnError' => true, 'targetClass' => Students::className(), 'targetAttribute' => ['student_id' => 'id']],
//            ['student_id', 'unique', 'when' => function($model) {
//                    return $model->isAttributeChanged('student_id') &&
//                            self::find()-> where(['student_id' => $model->student_id])
//                                      -> andWhere (["course_id" => $model->course_id])
//                                      -> andWhere (["academic_year" => $model->academic_year,]) -> count() ==6; 
//                   
//                }, 'message' => 'This student already has a maximum number of 6 courses.'],
        ];
    }

    public function studentsCourses() {
        $course = self::find()->where(['student_id' => $this->student_id])
                        ->andWhere(["academic_year" => $this->academic_year,])->count();
        if ($course >= 6) {
            $this->addError('student_id', "This student already has a maximum number of 6 courses.");
        }
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'academic_year' => 'Academic Year',
            'term' => 'Term',
            'student_id' => 'Student',
            'course_id' => 'Course',
        ];
    }

    /**
     * Gets query for [[Course]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourse() {
        return $this->hasOne(Courses::className(), ['course_id' => 'id']);
    }

    /**
     * Gets query for [[Student]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStudent() {
        return $this->hasOne(Students::className(), ['id' => 'student_id']);
    }

}
