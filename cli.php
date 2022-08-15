<?php

use GeekBrains\LevelTwo\Blog\Commands\Arguments;
use GeekBrains\LevelTwo\Blog\Commands\CreateUserCommand;


require_once __DIR__ . '/vendor/autoload.php';


$container = require __DIR__ . '/bootstrap.php';


$command = $container->get(CreateUserCommand::class);

try {
    $command->handle(Arguments::fromArgv($argv));
} catch (Exception $exception) {
    echo $exception->getMessage();
}
