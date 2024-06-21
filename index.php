<?php

require 'core/router.php';

$router = new router;

require 'routes.php';

$uri = trim($_SERVER['REQUEST_URI'], '/');

require $router->direct($uri);