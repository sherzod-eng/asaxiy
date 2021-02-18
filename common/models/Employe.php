<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "employe".
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property int|null $age
 * @property string|null $address
 * @property string|null $country_of_orign
 * @property string|null $email
 * @property string|null $phone
 * @property int|null $hired
 * @property int|null $status_id
 *
 * @property Status $status
 * @property Notes[] $notes
 */
class Employe extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'employe';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'surname', 'email'], 'required'],
            [['age', 'hired', 'status_id'], 'integer'],
            [['address'], 'string', 'min' => 10],
            [['name', 'surname'], 'string', 'min' => 5, 'max' => 50],
            [['email'], 'email'],
            [['country_of_orign'], 'string', 'max' => 255],
            [['phone'], 'string', 'max' => 20],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => Status::className(), 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'surname' => 'Surname',
            'age' => 'Age',
            'address' => 'Address',
            'country_of_orign' => 'Country Of Orign',
            'email' => 'Email',
            'phone' => 'Phone',
            'hired' => 'Hired',
            'status_id' => 'Status ID',
        ];
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(Status::className(), ['id' => 'status_id']);
    }

    public function getUsers()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    
    public function getNotes()
    {
        return $this->hasMany(Notes::className(), ['employe_id' => 'id']);
    }
}
