<?php

namespace common\models;

use yii;

/**
 * This is the model class for table "post".
 *
 * @property integer $ID
 * @property string $Titulo
 * @property string $Texto
 * @property integer $Publicar
 * @property string $Fecha_creacion
 * @property string $Fecha_edicion
 * @property integer $idAutor
 */
class Postservice extends yii\db\ActiveRecord
{
  /**
   * @inheritdoc
   */
  public static function tableName()
  {
      return 'post';
  }

  /**
   * @inheritdoc
   */
  public function rules()
  {
      return [
          [['Titulo', 'Texto', 'Publicar'], 'required'],
          [['ID', 'Publicar', 'idAutor'], 'integer'],
          [['Texto'], 'string'],
          [['Fecha_creacion', 'Fecha_edicion'], 'safe'],
          [['Titulo'], 'string', 'max' => 50],
      ];
  }
}
