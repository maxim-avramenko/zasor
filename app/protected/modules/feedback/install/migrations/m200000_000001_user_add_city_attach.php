<?php

class m200000_000001_user_add_city_attach extends yupe\components\DbMigration
{
    public function safeUp()
    {
        $this->addColumn('{{feedback_feedback}}', 'city', "varchar(255) DEFAULT NULL");
        $this->addColumn('{{feedback_feedback}}', 'attach', "varchar(255) DEFAULT NULL");
    }

    public function safeDown()
    {
        $this->dropColumn('{{feedback_feedback}}', 'city');
        $this->dropColumn('{{feedback_feedback}}', 'attach');
    }
}

