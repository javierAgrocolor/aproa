<?php

namespace app\models;

use Yii;
use \yii\db\ActiveRecord;
use \yii\web\IdentityInterface;

/**
 * This is the model class for table "usuarios".
 *
 * @property integer $ID
 * @property string $username
 * @property string $pass
 * @property integer $nivel_acceso
 * @property integer $nuevo
 * @property integer $perfil
 * @property string $uuid
 */
class Usuarios extends ActiveRecord implements IdentityInterface
{
    public $username;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [            
            [['usuario', 'pass', 'nuevo', 'perfil', 'uuid'], 'required'],
            [['usuario', 'pass'], 'string'],
            [['nivel_acceso', 'nuevo', 'perfil'], 'integer'],
            [['uuid'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'ID' => 'ID',
            'usuario'=> 'Usuario',    
            'pass' => 'Pass',
            'nivel_acceso' => 'Nivel Acceso',
            'nuevo' => 'Nuevo',
            'perfil' => 'Perfil',
            'uuid' => 'Uuid',
        ];
    }
    
    public function leerTodos(){
        $query = new \yii\db\Query();
        //$fecha_actual = date('Y-m-d');
        $query->select('*')
                ->from('usuarios');
        $rows = $query->all(Usuarios::getDb());
        return $rows;
    }

    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['ID' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->ID;
    }
    
    public function getUsuario(){
        return $this->usuario;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->ID;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }




    public static function findByUsername($username)
    {
        /*foreach (self::$users as $user) {
            if (strcasecmp($user['username'], $username) === 0) {
                return new static($user);
            }
        }*/
        
        /*$user = Usuarios::find()
        ->where(['usuario' => $username])
        ->one();

    return $user;*/
        
       /*$query = new \yii\db\Query();
        //$fecha_actual = date('Y-m-d');
        $query->select('Usuario')
                ->from('usuarios')
                ->where('Usuario=:usuario',array(':usuario'=>$username));
        $rows = $query->one(Usuarios::getDb());
        return $rows;*/
        $user = Usuarios::find()->where(['Usuario' => $username])->one();
        
        return $user;
    }

    public function validatePassword($password)
    {
        return  $this->pass === $password;
    }

}
