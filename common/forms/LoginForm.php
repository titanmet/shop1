<?php
namespace common\forms;

use yii\base\Model;

/**
 * Login form
 */
class LoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [

            [['username', 'password'], 'required'],

            ['rememberMe', 'boolean'],

        ];
    }


}
