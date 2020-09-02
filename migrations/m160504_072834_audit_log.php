<?php

use yii\db\Migration;

class m160504_072834_audit_log extends Migration
{
    public function up()
    {
        $tables = Yii::$app->db->schema->getTableNames();
        $dbType = $this->db->driverName;
        $tableOptions_mysql = "CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB";
        $tableOptions_mssql = "";
        $tableOptions_pgsql = "";
        $tableOptions_sqlite = "";
        /* MYSQL */
        if (!in_array('audit_trail', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%audit_trail}}', [
                'activity_id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                0 => 'PRIMARY KEY (`activity_id`)',
                'user_id' => 'INT(11) NOT NULL',
                'datetime' => 'DATETIME NOT NULL',
                'module' => 'VARCHAR(255) NULL',
                'controller' => 'VARCHAR(255) NOT NULL',
                'action' => 'VARCHAR(255) NOT NULL',
                'route' => 'VARCHAR(255) NOT NULL',
                'params' => 'TEXT NULL',
            ], $tableOptions_mysql);
        }
        }
         
        /* MYSQL */
        if (!in_array('change_log', $tables))  { 
        if ($dbType == "mysql") {
            $this->createTable('{{%change_log}}', [
                'id' => 'VARCHAR(255) NOT NULL',
                'class' => 'VARCHAR(255) NOT NULL',
                'change_id' => 'INT(11) NOT NULL AUTO_INCREMENT',
                2 => 'PRIMARY KEY (`change_id`)',
                'type' => 'ENUM(\'Insert\',\'Update\',\'Delete\') NULL',
                'user' => 'VARCHAR(255) NOT NULL',
                'datetime' => 'DATETIME NOT NULL',
                'update_details' => 'TEXT NOT NULL',
                'original_details' => 'TEXT NULL',
            ], $tableOptions_mysql);
        }
        }
         
         
        //$this->createIndex('idx_id_4246_00','change_log','id',0);

    }

    public function down()
    {
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `audit_trail`');
        $this->execute('SET foreign_key_checks = 1;');
        $this->execute('SET foreign_key_checks = 0');
        $this->execute('DROP TABLE IF EXISTS `change_log`');
        $this->execute('SET foreign_key_checks = 1;');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
