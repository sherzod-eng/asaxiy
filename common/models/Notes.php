<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "notes".
 *
 * @property int $id
 * @property string|null $content
 * @property int|null $employe_id
 *
 * @property Employe $employe
 */
class Notes extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'notes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['content'], 'required'],
            [['content', 'inter_date'], 'string'],
            [['employe_id'], 'integer'],
            [['employe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employe::className(), 'targetAttribute' => ['employe_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Xabar (eslatma)',
            'inter_date' => 'Intervyu sanasi va vaqti', 
            'employe_id' => 'id',
        ];
    }

    /**
     * Gets query for [[Employe]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEmploye()
    {
        return $this->hasOne(Employe::className(), ['id' => 'employe_id']);
    }
}
