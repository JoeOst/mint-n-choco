<?php

use yii\db\Migration;

/**
 * Handles adding birth to table `author`.
 */
class m170525_172635_add_birth_column_to_author_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('author', 'birth', $this->date());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('author', 'birth');
    }
}
