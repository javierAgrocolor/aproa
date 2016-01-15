<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Presentacion".
 *
 * @property integer $id
 * @property integer $codigo
 * @property string $presentacion
 *
 * @property DatosGeneralesMayoristas[] $datosGeneralesMayoristas
 * @property DatosOrigen[] $datosOrigens
 * @property DatosSupermercados[] $datosSupermercados
 */
class Presentacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Presentacion';
    }

    /**
     * @return \yii\db\Connection the database connection used by this AR class.
     */
    public static function getDb()
    {
        return Yii::$app->get('db2');
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo', 'presentacion'], 'required'],
            [['codigo'], 'integer'],
            [['presentacion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo' => 'Codigo',
            'presentacion' => 'Presentacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGeneralesMayoristas()
    {
        return $this->hasMany(DatosGeneralesMayoristas::className(), ['cod_presentacion' => 'codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosOrigens()
    {
        return $this->hasMany(DatosOrigen::className(), ['cod_presentacion' => 'codigo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosSupermercados()
    {
        return $this->hasMany(DatosSupermercados::className(), ['cod_presentacion' => 'codigo']);
    }
    
    /**
     * Devuelve todas las presentaciones ordenadas alfabeticamente.
     * @return Array
     */
    public function leerTodos(){
        return Presentacion::find()->orderBy("presentacion")->all();
    }
}
