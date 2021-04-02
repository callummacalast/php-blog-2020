<?php

abstract class Entity 
{
  protected $dbc;
  protected $tableName;
  protected $fields;

  abstract protected function initFields();

  protected function  __construct($dbc, $tableName) {
    $this->dbc = $dbc;
    $this->tableName = $tableName;
    $this->initFields();
  }


  public function findBy($fieldName, $fieldValue) {

 
    $sql = "SELECT * FROM " . $this->tableName . " WHERE " . $fieldName . " = :pretty_url";
    $stmt = $this->dbc->prepare($sql);
    $stmt->execute(['pretty_url' => $fieldValue]);
    $databaseData = $stmt->fetch();
    // $stmt->debugDumpParams(); // Allows for debugging the query

    $this->setValues($databaseData);

    // echo '<pre>';
    // var_dump($pageData);
    // echo '</pre>';


  }

  // Looping over the values so they're dynamic
  public function setValues($values) {
    foreach ($this->fields as $fieldName) {
      $this->$fieldName = $values[$fieldName];
    }

  }
}