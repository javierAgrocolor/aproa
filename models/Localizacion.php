<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Localizacion".
 *
 * @property integer $id
 * @property integer $codigo_localizacion
 * @property string $Localizacion
 *
 * @property DatosGeneralesMayoristas[] $datosGeneralesMayoristas
 * @property DatosOrigen[] $datosOrigens
 * @property DatosSupermercados[] $datosSupermercados
 */
class Localizacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Localizacion';
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
            [['codigo_localizacion', 'Localizacion'], 'required'],
            [['codigo_localizacion'], 'integer'],
            [['Localizacion'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_localizacion' => 'Codigo Localizacion',
            'Localizacion' => 'Localizacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGeneralesMayoristas()
    {
        return $this->hasMany(DatosGeneralesMayoristas::className(), ['cod_localizacion' => 'codigo_localizacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosOrigens()
    {
        return $this->hasMany(DatosOrigen::className(), ['cod_localizacion' => 'codigo_localizacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosSupermercados()
    {
        return $this->hasMany(DatosSupermercados::className(), ['cod_localizacion' => 'codigo_localizacion']);
    }
    
    
    /**
     * Devuelve todas las localizaciones ordenadas alfabeticamente.
     * @return Array
     */
    public function leerTodos(){
        return Localizacion::find()->orderBy("Localizacion")->all();
    }
}
