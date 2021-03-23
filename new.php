<?php

// name the file
$timestamps = time();
$date = date('d_m_y');

// get the command options
$options = getopt('t:');

// get the table name
$tablename = $options['t'];

$filename = 'create_' . $tablename . '_table_' . $timestamps . '_' . $date . '.php';

$migration_path = "Database/migrations/";
$migrationClassName = "Create" . ucfirst($tablename) . "Table";
$migration_txt = "<?php

namespace App\Database\Migrations;

use Migration;

class $migrationClassName extends Migration
{
    public function create()
    {
           
    }
}";

// Creating a file
if (!file_exists($migration_path . $filename)) {
    // Create the file
    if (fopen($migration_path . $filename, 'w')) {
        echo "Migration create_" . $tablename . "_table file created successfully.";
    }
    // Writing on the file
    $migration_file = $migration_path . $filename;
    fwrite(fopen($migration_file, 'w'), $migration_txt);
}