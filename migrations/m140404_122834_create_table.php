<?php

class m140404_122834_create_table extends CDbMigration
{
    public function up()
    {
        $this->execute(
            "CREATE TABLE IF NOT EXISTS `queue` (
              `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
              `type` tinyint(2) unsigned NOT NULL,
              `data` text NOT NULL,
              `create_time` datetime DEFAULT NULL,
              PRIMARY KEY (`id`),
              KEY `type` (`type`),
              KEY `create_time` (`create_time`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8;"
        );
    }

    public function down()
    {
        $this->dropTable('file');
    }
}