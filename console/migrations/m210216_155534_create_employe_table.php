<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%employe}}`.
 */
class m210216_155534_create_employe_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%employe}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(50)->notNull(),
            'surname' => $this->string(50)->notNull(),
            'age' => $this->integer(),
            'address' => $this->text(),
            'country_of_orign' => $this->string(),
            'email' => $this->string(50),
            'phone' => $this->string(20),
            'hired' => $this->boolean()->defaultValue(false),
            'status_id' => $this->integer(),
            'user_id' => $this->integer()
        ]);

        $this->createIndex(
            'idx-employe-status_id',
            'employe',
            'status_id'
        );

        $this->createIndex(
            'idx-employe-user_id',
            'employe',
            'user_id'
        );
        
        $this->addForeignKey(
            'fk-employe-status_id',
            'employe',
            'status_id',
            'status',
            'id',
            'CASCADE'
        );

         $this->addForeignKey(
            'fk-employe-user_id',
            'employe',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }


    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%employe}}');
    }
}
