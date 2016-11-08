<?php

namespace backend\models;

use Yii;

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
class Post extends \yii\db\ActiveRecord
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
            [['ID', 'Titulo', 'Texto', 'Publicar', 'Fecha_creacion', 'idAutor'], 'required'],
            [['ID', 'Publicar', 'idAutor'], 'integer'],
            [['Texto'], 'string'],
            [['Fecha_creacion', 'Fecha_edicion'], 'safe'],
            [['Titulo'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'Titulo' => 'Titulo',
            'Texto' => 'Texto',
            'Publicar' => 'Publicar',
            'Fecha_creacion' => 'Fecha Creacion',
            'Fecha_edicion' => 'Fecha Edicion',
            'idAutor' => 'Id Autor',
        ];
    }
}
