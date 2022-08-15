<?php

namespace GeekBrains\LevelTwo\Blog\Exceptions;

use Psr\Container\NotFoundExceptionInterface;


class NotFoundException extends \Exception implements NotFoundExceptionInterface
{

}