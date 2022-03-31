<?php

  use App\Core\App;

  App::get('/home', function() {
    App::view('Home');
  });