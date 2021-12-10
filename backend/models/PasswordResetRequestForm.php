<?php

namespace backend\models;

use yii\base\Model;
use backend\models\Users;
use Yii;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PasswordResetRequestForm
 *
 * @author Chansa Sinyangwe
 */
class PasswordResetRequestForm extends Model {

    //put your code here

    public function rules() {
        return [
            [["email",], "trim"],
            [["email",], "required"],
            [["email",], "email"],
            [["email",], "exist", "targetClass" => "app\models\Users", "filter" => ["status" => 1],
                "messsge" => "unknown email Address"],
        ];
    }

    public function accountActivation($email) {
        $user = \backend\models\Users::findOne(["email" => $email, "status" => 0]);
        if (empty($user)) {
            return false;
        }
        if (!Users::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();

            if (!$user->save()) {
                return false;
            }
        }
        return Yii::$app->mailer->compose(["html" => "passwordResetToken-html", "text" => "passwordResetToken-text"],
                                ["user" => $user],)
                        ->setFrom([Yii::$app->params['supportEmail'] => 
                        Yii::$app->params['supportEmail']])
                        ->setTo($email)
                        ->setSubject("Account activation")
                        ->send();
    }

    public function sendEmailAccountCreation($email) { /* @var $user User */
        $user = Users::findOne(['status' => Users::STATUS_INACTIVE, 'email' => $email,]);
        if (!$user) {
            return false;
        } if (!Users::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        } return Yii::$app->mailer->compose(['html' => 'passwordResetToken-html',
            'text' => 'passwordResetToken-text'], 
                ['user' => $user])->
                setFrom([Yii::$app->params['supportEmail'] => 
                        Yii::$app->params['supportEmail']])->
                setTo($email)->
                setSubject(Yii::$app->name . 
                                ' account activation')->send();
    }

}
