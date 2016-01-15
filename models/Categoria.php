<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "Categoria".
 *
 * @property integer $id
 * @property string $categoria
 * @property integer $cod_categoria
 *
 * @property DatosGeneralesMayoristas[] $datosGeneralesMayoristas
 * @property DatosOrigen[] $datosOrigens
 * @property DatosSupermercados[] $datosSupermercados
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'Categoria';
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
            [['id', 'categoria', 'cod_categoria'], 'required'],
            [['id', 'cod_categoria'], 'integer'],
            [['categoria'], 'string']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'categoria' => 'Categoria',
            'cod_categoria' => 'Cod Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosGeneralesMayoristas()
    {
        return $this->hasMany(DatosGeneralesMayoristas::className(), ['cod_categoria' => 'cod_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosOrigens()
    {
        return $this->hasMany(DatosOrigen::className(), ['cod_categoria' => 'cod_categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDatosSupermercados()
    {
        return $this->hasMany(DatosSupermercados::className(), ['cod_categoria' => 'cod_categoria']);
    }
}
