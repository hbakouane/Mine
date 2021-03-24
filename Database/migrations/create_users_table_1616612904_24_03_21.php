<?php

namespace App\Database\Migrations;

use Migration;

class CreateUsersTable extends Migration
{
    public function build()
    {
        Migration::createTable('users')->('
            CREATE TABLE `users` (
                `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                
                `created_at` TIMESTAMP CURRENT_TIMESTAMP
            )
        ')->save();
    }
    
    public function destroy() {
        Migration::dropTable('users')->save();
    }
}