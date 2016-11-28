<?php
namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\models\SignupForm;
use yii;



class UserController extends ActiveController
{
    public $modelClass = 'common\models\user';

    public function actions()
    {
      $actions = parent::actions();
      unset($actions['create']);
      return $actions;

    }
  public function actionCreate()
  {
      //print_r(Yii::$app->request->post());
      //die();
      //$model = new SignupForm();
      //$model->load(Yii::$app->request->post());
      //$model->save();

      $model = new SignupForm();
      if ($model->load(Yii::$app->getRequest()->getBodyParams(), '')) {
          if ($user = $model->signup()) {
              if (!Yii::$app->getUser()->login($user)) {
                  throw new Exception();

              }
          }
      }
      return $model;

  }


}
