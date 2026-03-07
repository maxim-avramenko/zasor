<?php

class m250308_120000_add_text_8_to_page extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{page_page}}', 'text_8', 'TEXT DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->dropColumn('{{page_page}}', 'text_8');
    }
}
