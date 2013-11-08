<?php

$app->mount( '/', new Controller\Badges());
$app->mount( '/badge', new Controller\Badge());
$app->mount( '/recipients', new Controller\Recipients());
$app->mount( '/recipient', new Controller\Recipient());
$app->mount( '/award', new Controller\Award());
$app->mount( '/backend/issuer', new Controller\Backend\Issuer());
$app->mount( '/backend/badge', new Controller\Backend\Badge());
$app->mount( '/backend/badgeassertion', new Controller\Backend\BadgeAssertion());