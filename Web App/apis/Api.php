<?php

  namespace Api;

  class Api {

    // Return Array Result as JSON
    protected function return_json($data) {
      if (!is_array($data)) {
        return;
      }

      header('Content-Type: application/json; charset=utf-8');
      echo json_encode($data);
    }
    
  }