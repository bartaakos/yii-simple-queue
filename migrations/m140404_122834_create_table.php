<?php

class m140404_122834_create_table extends CDbMigration
{
    public function up()
    {
        $this->execute(
            "CREATE TABLE `queue` (
                `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
                `type` TINYINT(2) UNSIGNED NOT NULL,
                `associated_id` INT UNSIGNED NULL,
                `data` TEXT NOT NULL,
                `create_time` DATETIME NULL DEFAULT NULL,
                PRIMARY KEY (`id`),
                INDEX `type` (`type`),
                INDEX `create_time` (`create_time`),
                INDEX `associated_id` (`associated_id`)
            )
            COLLATE='utf8_general_ci'
            ENGINE=InnoDB;"
        );
    }

    public function down()
    {
        $this->dropTable('queue');
    }
}