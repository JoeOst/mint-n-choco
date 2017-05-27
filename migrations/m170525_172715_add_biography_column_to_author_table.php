<?php

use yii\db\Migration;

/**
 * Handles adding biografy to table `author`.
 */
class m170525_172715_add_biography_column_to_author_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('author', 'biography', $this->string());
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('author', 'biography');
    }
}
