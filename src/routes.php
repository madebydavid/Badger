<?php

$app->mount( '/', new Controller\Badges());
$app->mount( '/badge', new Controller\Badge());
$app->mount( '/recipients', new Controller\Recipients());
$app->mount( '/recipient', new Controller\Recipient());