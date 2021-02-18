<?php

namespace restapi\models;

use Yii;

class Notes extends \yii\db\ActiveRecord
{
    
    public static function tableName()
    {
        return 'notes';
    }


    public function rules()
    {
        return [
            [['content', 'inter_date', 'employe_id'], 'required'],
            [['content', 'inter_date'], 'string'],
            [['employe_id'], 'integer'],
            [['employe_id'], 'exist', 'skipOnError' => true, 'targetClass' => Employe::className(), 'targetAttribute' => ['employe_id' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'content' => 'Xabar (eslatma)',
            'inter_date' => 'Intervyu sanasi va vaqti', 
            'employe_id' => 'id',
        ];
    }

    
    public function getEmploye()
    {
        return $this->hasOne(Employe::className(), ['id' => 'employe_id']);
    }

    public function ApiSaveNotes($content, $date, $id)
    {
        $this->content = $content;
        $this->inter_date = $date;
        $this->employe_id = $id;
        $this->save();

        return $this->save() ? ['success' => true] : ['success' => false, 'errors' => $this->getErrors()];
    }
}
