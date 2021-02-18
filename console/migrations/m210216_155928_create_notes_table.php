<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%notes}}`.
 */
class m210216_155928_create_notes_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%notes}}', [
            'id' => $this->primaryKey(),
            'content' => $this->text(),
            'employe_id' => $this->integer()
        ]);
        $this->createIndex(
            'idx-notes-employe_id',
            'notes',
            'employe_id'
        );

        $this->addForeignKey(
            'fk-notes-employe_id',
            'notes',
            'employe_id',
            'employe',
            'id',
            'CASCADE'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%notes}}');
    }
}
