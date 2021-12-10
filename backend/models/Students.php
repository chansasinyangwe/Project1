<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property int $id
 * @property string $first_name
 * @property string $last_name
 * @property string|null $authKey
 * @property string $password
 * @property string|null $password_reset_token
 * @property int|null $department_id
 * @property string $computer_number
 *
 * @property CourseEnrollment[] $courseEnrollments
 * @property Department $department
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['first_name', 'last_name', 'password', 'computer_number'], 'required'],
            [['first_name', 'last_name', 'password'], 'string'],
            [['department_id'], 'integer'],
            [['authKey', 'password_reset_token', 'computer_number'], 'string', 'max' => 45],
            [['department_id'], 'exist', 'skipOnError' => true, 'targetClass' => Department::className(),
                'targetAttribute' => ['department_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
           // 'authKey' => 'Auth Key',
            'password' => 'Password',
           // 'password_reset_token' => 'Password Reset Token',
            'department_id' => 'Department',
            'computer_number' => 'Computer Number',
        ];
    }

    /**
     * Gets query for [[CourseEnrollments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCourseEnrollments()
    {
        return $this->hasMany(CourseEnrollment::className(), ['student_id' => 'id']);
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
