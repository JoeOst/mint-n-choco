<?php

use yii\db\Migration;

/**
 * Handles the creation of table `genre`.
 */
class m170520_200915_create_genre_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('genre', [
            'id' => $this->primaryKey(),
            'title' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('genre');
    }
}
