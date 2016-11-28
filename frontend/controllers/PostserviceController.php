<?php

namespace frontend\controllers;

use yii\rest\ActiveController;
use frontend\modes\post;
use yii\base\ErrorExeption;
/**
 * PostController implements the CRUD actions for Post model.
 */
class PostserviceController extends  ActiveController
{
    public $modelClass = 'common\models\postservice';

    public function action()
    {
        $actions = parent::actions();
        return $actions;
    }

    public function actionCreate()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post())  ) {


        $rows = (new \yii\db\Query())->select('id')->from('post')->where('id in (SELECT MAX(id) FROM post)')->limit(10)->all();
        $val= ArrayHelper::map($rows, 'id', 'id');
        $id = implode($val);/*Convierte valor de arreglo a string*/

        $model->ID =  ($id+1);
        $model->Publicar = 0;
        $model->idAutor  = Yii::$app->user->identity->id;
        $model->Fecha_creacion = date('y-m-d');

        $model->save();


            return $this->redirect(['view', 'id' => $model->ID]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }
}
