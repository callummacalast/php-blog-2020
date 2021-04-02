<?php
class Template 
{
  private $layout; // Only this class
  //protected $layout; // Inside and children
  //public $layout; // Everywhere

  public function __construct($layout)
  {
    $this->layout = $layout;
  }

  function view($template, $variables) {
    extract($variables);
    include VIEW_PATH .'layout/' . $this->layout . '.html';

  }
}