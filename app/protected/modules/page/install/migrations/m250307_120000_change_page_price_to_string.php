<?php

class m250307_120000_change_page_price_to_string extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->alterColumn('{{page_page}}', 'price', 'VARCHAR(255) DEFAULT NULL');
    }

    public function safeDown()
    {
        $this->alterColumn('{{page_page}}', 'price', 'DECIMAL(10,2) DEFAULT NULL');
    }
}
