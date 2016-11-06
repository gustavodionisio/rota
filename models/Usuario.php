<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

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
 * @property string $ativo
 */
class Usuario extends \yii\db\ActiveRecord implements IdentityInterface
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
            [['admin', 'numero', 'ativo'], 'integer'],
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
            'id' => 'Código',
            'firstName' => 'Nome',
            'lastName' => 'Sobrenome',
            'username' => 'Usuário',
            'password' => 'Senha',
            'authKey' => 'Auth Key',
            'email' => 'E-mail',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'admin' => 'Admin',
            'telefone' => 'Telefone',
            'cpf' => 'CPF',
            'rg' => 'RG',
            'dataNasc' => 'Data de Nascimento',
            'estado' => 'Estado',
            'cidade' => 'Cidade',
            'bairro' => 'Bairro',
            'rua' => 'Rua',
            'numero' => 'Número',
            'referencia' => 'Referência',
            'nomeEmergencia' => 'Nome para Emergência',
            'telefoneEmergencia' => 'Telefone para Emergência',
            'ativo' => 'Ativo',
        ];
    }

    /**
     * Finds an identity by the given ID.
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface the identity object that matches the given ID.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    /**
     * Finds an identity by the given token.
     * @param mixed $token the token to be looked for
     * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
     * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
     * @return IdentityInterface the identity object that matches the given token.
     * Null should be returned if such an identity cannot be found
     * or the identity is not in an active state (disabled, deleted, etc.)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\base\NotSupportedException();
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    public static function findByUsername($username)
    {
        return self::findOne(['username' => $username]);
    }

    public function validatePassword($password)
    {
        return $this->password === $password;
    }
}
