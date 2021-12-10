<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "lecturer".
 *
 * @property int $id
 * @property string $fisrt_name
 * @property string $last_name
 * @property string|null $qualifications
 * @property int|null $department_id
 *
 * @property Courses[] $courses
 * @property Department $department
 */
class Lecturer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lecturer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['fisrt_name', 'last_name'], 'required'],
            [['fisrt_name', 'last_name'], 'string'],
            [['department_id'], 'integer'],
            [['qualifications'], 'string', 'max' => 45],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(), 'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fisrt_name' => 'Fisrt Name',
            'last_name' => 'Last Name',
            'qualifications' => 'Qualifications',
            'department_id' => 'Department',
        ];
    }

    /**
     * Gets query for [[Courses]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourses()
    {
        return $this->hasMany(Courses::className(), ['lecturer_id' => 'id']);
    }

    /**
     * Gets query for [[Department]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDepartment()
    {
        return $this->hasOne(Department::className(), ['id' => 'department_id']);
    }
}
