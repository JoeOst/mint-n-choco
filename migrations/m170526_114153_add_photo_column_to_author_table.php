<?php

use yii\db\Migration;

/**
 * Handles adding photo to table `author`.
 */
class m170526_114153_add_photo_column_to_author_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('author', 'photo', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('author', 'photo');
    }
}
