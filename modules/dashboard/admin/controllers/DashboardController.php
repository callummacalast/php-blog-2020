<?php

class DashboardController extends Controller {

    function runBeforeAction() {
      if ($_SESSION['is_admin'] ?? false == true){
        return true;
      } 
      $action = $_GET['action'] ?? $_POST['action'] ?? 'default';
      if ($action != 'login') {
        header('Location: admin/index.php?module=dashboard&action=login');
      } else {
        return true;
      }
    }

    function defaultAction() {

    echo 'Welcome to  administration';
    }

    function loginAction() {

      if ($_POST['postAction'] ?? 0 == 1) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        var_dump('Bad login');
      }
      include VIEW_PATH . 'admin/login.html';
    }
  }
