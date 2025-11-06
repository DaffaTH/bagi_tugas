<?php

if (file_exists('SECRET.php')) include 'SECRET.php'; else define('SECRET', []);

include 'app/config.php';
include 'app/db/db.php';
include 'app/helpers/BPS.php';
include 'app/helpers/Res.php';
include 'app/helpers/Auth.php';
include 'app/helpers/Doc.php';
include 'app/lib/communitybps.php';

Auth::checkSavedLogin();



/*
------------------------------------------------------------------------
ROUTES
------------------------------------------------------------------------
*/

include 'routes/views.php';

if (path('/^api\//')) {
	include 'routes/generate-and-download.php';
	include 'routes/api.php';
}

include 'routes/others.php';

Res::sendError(404);
