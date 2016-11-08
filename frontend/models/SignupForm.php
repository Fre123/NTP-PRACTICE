<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use yii;
use yii\helpers\ArrayHelper;
/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        $auth = Yii::$app->authManager;
        $authorRole = $auth->getRole('author');

        $rows = (new \yii\db\Query())->select('id')->from('user')->where('id in (SELECT MAX(id) FROM user)')->limit(10)->all();
        $val= ArrayHelper::map($rows, 'id', 'id');
        $id = implode($val);/*Convierte valor de arreglo a string*/

        $auth->assign($authorRole,($id)+1);


        return $user->save() ? $user : null;
    }
}
