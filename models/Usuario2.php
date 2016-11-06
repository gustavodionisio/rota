<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuario".
 *
 * @property integer $id
 * @property string $firstName
 * @property string $lastName
 * @property string $username
 * @property string $password
 * @property string $authKey
 * @property string $email
 * @property integer $admin
 * @property string $telefone
 * @property string $cpf
 * @property string $rg
 * @property string $dataNasc
 * @property string $estado
 * @property string $cidade
 * @property string $bairro
 * @property string $rua
 * @property integer $numero
 * @property string $referencia
 * @property string $nomeEmergencia
 * @property string $telefoneEmergencia
 * @property string $latitude
 * @property string $longitude
 */
class Usuario2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['firstName', 'lastName', 'username', 'password', 'authKey', 'email'], 'required'],
            [['admin', 'numero'], 'integer'],
            [['dataNasc'], 'safe'],
            [['firstName'], 'string', 'max' => 15],
            [['lastName', 'telefone'], 'string', 'max' => 20],
            [['username', 'password'], 'string', 'max' => 30],
            [['authKey', 'cidade', 'bairro', 'rua', 'referencia', 'nomeEmergencia', 'telefoneEmergencia'], 'string', 'max' => 255],
            [['email', 'latitude', 'longitude'], 'string', 'max' => 60],
            [['cpf', 'rg'], 'string', 'max' => 14],
            [['estado'], 'string', 'max' => 2],
            [['username'], 'unique'],
            [['authKey'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'firstName' => 'First Name',
            'lastName' => 'Last Name',
            'username' => 'Username',
            'password' => 'Password',
            'authKey' => 'Auth Key',
            'email' => 'Email',
            'admin' => 'Admin',
            'telefone' => 'Telefone',
            'cpf' => 'Cpf',
            'rg' => 'Rg',
            'dataNasc' => 'Data Nasc',
            'estado' => 'Estado',
            'cidade' => 'Cidade',
            'bairro' => 'Bairro',
            'rua' => 'Rua',
            'numero' => 'Numero',
            'referencia' => 'Referencia',
            'nomeEmergencia' => 'Nome Emergencia',
            'telefoneEmergencia' => 'Telefone Emergencia',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
        ];
    }
}
