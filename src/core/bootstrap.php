<?php

$bootFile = __DIR__.'/';

require $bootFile . 'Services/register_service_providers.php';

require $bootFile . 'Services/controller_services.php';
require $bootFile . 'Services/core_services.php';

require $bootFile . 'routes.php';