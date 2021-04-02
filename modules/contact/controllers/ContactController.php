<?php 

class ContactController extends Controller // We are inherting everything from the parent Controller 'src/controller.php'
{

  function runBeforeAction() { //This method will run before anything else is done, validating

    if ($_SESSION['has_submitted_the_form'] ?? 0 == 1) { // Checking if the value is == 1 (has been submitted then present the page)


    $dbh = DatabaseConnection::getInstance();
    $dbc = $dbh->getConnection();
    
  
    $pageObj = new Page($dbc);
    $pageObj->findBy('id', $this->entityId);
    $variables['pageObj'] = $pageObj;

    $template = new Template('default');
    $template->view('contact/views/static-page', $variables);
      return false;
    }
    return true;
  }

  function defaultAction() {

    $dbh = DatabaseConnection::getInstance();
    $dbc = $dbh->getConnection();
    
  
    $pageObj = new Page($dbc);
    $pageObj->findBy('id', $this->entityId);
    $variables['pageObj'] = $pageObj;

    $template = new Template('default');
    $template->view('contact/views/contact-us', $variables);
  }
  

  function submitContactFormAction() {
  // Validate
  // store data
  // Send email
  $_SESSION['has_submitted_the_form'] = 1; // Knows that form has been successfully submitted the form
    
  $dbh = DatabaseConnection::getInstance();
  $dbc = $dbh->getConnection();
    
  $pageObj = new Page($dbc);
  $pageObj->findBy('id', $this->entityId);
  $variables['pageObj'] = $pageObj;

  $template = new Template('default');
  $template->view('page/views/contact/static-page', $variables);

  $template = new Template('default');
  $template->view('page/views/static-page', $variables);

  }


  
}
// echo $action;
 
