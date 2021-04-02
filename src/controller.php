<?php
class Controller {

  protected $entityId;

  function runAction($actionName) {

    if (method_exists($this, 'runBeforeAction')){
      $result = $this->runBeforeAction();

      if ($result == false) {
        return;
      }
    }
    $actionName .= 'Action'; //Passing this with the appended string 'Action' so we know it's an action
    if (method_exists($this, $actionName)){
       $this->$actionName(); //This will run whatever we pass into actionName
    } else {
      include VIEW_PATH . '/status-pages/404.html';
    }
  }

  public function setEntityId($entityId) {
    $this->entityId = $entityId;
  }
}