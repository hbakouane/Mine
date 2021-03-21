<?php


namespace App\Core;


class Model
{
    public $toFill = [];
    public $table;
    public $data;

    public function order($data)
    {
        $this->data = [];
        foreach ($data as $key => $value) {
            $this->data[$key] = $value;
        }
        return $this;
    }

    public function save() {
        echo "saving to $this->table table.";
    }

}