<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Origen".
 *
 * @property integer $id
 * @property integer $codigo_origen
 * @property string $origen
 *
 * @property DatosGeneralesMayoristas[] $datosGeneralesMayoristas
 * @property DatosOrigen[] $datosOrigens
 * @property DatosSupermercados[] $datosSupermercados
 */
class Origen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Origen';
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
            [['codigo_origen', 'origen'], 'required'],
            [['codigo_origen'], 'integer'],
            [['origen'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_origen' => 'Codigo Origen',
            'origen' => 'Origen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGeneralesMayoristas()
    {
        return $this->hasMany(DatosGeneralesMayoristas::className(), ['cod_origen' => 'codigo_origen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosOrigens()
    {
        return $this->hasMany(DatosOrigen::className(), ['cod_origen' => 'codigo_origen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosSupermercados()
    {
        return $this->hasMany(DatosSupermercados::className(), ['cod_origen' => 'codigo_origen']);
    }
    
    /**
     * Devuelve todos los origenes ordenados alfabeticamente.
     * @return Array 
     */
    public function leerTodos(){
        return Origen::find()-> where('id not in (19,26,27,28,29,31,92)')->orderBy("origen")->all();
    }
}
