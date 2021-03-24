<?php

// get the command options
$options = $argv;

// get the table name
$wanted = $options[1];

// Handle the migrations
if ($wanted === 'migration') {

    // name the file
    $timestamps = time();
    $date = date('d_m_y');
    $filename = 'create_' . $options[2] . '_table_' . $timestamps . '_' . $date . '.php';

    $migration_path = "Database/migrations/";
    $migrationClassName = "Create" . ucfirst($options[2]) . "Table";
    $migration_txt = "<?php

namespace App\Database\Migrations;

use Migration;

class $migrationClassName extends Migration
{
    public function build()
    {
        Migration::createTable('$options[2]')->('
            CREATE TABLE `$options[2]` (
                `id` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
                
                `created_at` TIMESTAMP CURRENT_TIMESTAMP
            )
        ')->save();
    }
    
    public function destroy() {
        Migration::dropTable('$options[2]')->save();
    }
}";
    createFile($migration_path, $filename, $migration_txt);
}

// Handle running the server
if ($wanted === 'server') {
    $port = $options[2] ? $options[2] : '3000';
    $output = "Server successfully started at port $port";
    print_r($output . PHP_EOL);
    exec("php -S localhost:" . $port);
}

// Handle creating a controller
if ($wanted === 'controller') {
    $filename = ucfirst($options[2]);
    $content = "<?php

namespace App\Controllers;

use App\Core\Application;
use App\Core\Request;

class $filename extends Controller
{
    public function index()
    {
        
    }
}";
    $message = $filename . ' created successfully.';
    createFile('Controllers/', $filename . '.php', $content, $message);
}

// Creating a file
function createFile($path, $filename, $content, $message = 'Created successfully.')
{
    if (!file_exists($path . $filename)) {
        // Create the file
        if (fopen($path . $filename, 'w')) {
            echo $message;
        } else {
            echo "Something went wrong, try again later.";
        }
        // Writing on the file
        fwrite(fopen($path . $filename, 'w'), $content);
    }
}
