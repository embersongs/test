<?php

namespace GeekBrains\LevelTwo\Blog\Http\Actions\Users;

use GeekBrains\LevelTwo\Blog\Exceptions\UserNotFoundException;
use GeekBrains\LevelTwo\Blog\Http\Actions\ActionInterface;
use GeekBrains\LevelTwo\Blog\Repositories\Interfaces\UsersRepositoryInterface;
use GeekBrains\LevelTwo\Blog\Http\ErrorResponse;
use GeekBrains\LevelTwo\Blog\Exceptions\AppException\HttpException;
use GeekBrains\LevelTwo\Blog\Http\Request;
use GeekBrains\LevelTwo\Blog\Http\Response;
use GeekBrains\LevelTwo\Blog\Http\SuccessfulResponse;


class FindByUsername implements ActionInterface
{

    public function __construct(
        private UsersRepositoryInterface $usersRepository
    ) {
    }


    public function handle(Request $request): Response
    {
        try {

            $username = $request->query('username');
        } catch (HttpException $e) {

            return new ErrorResponse($e->getMessage());
        }
        try {

            $user = $this->usersRepository->getByUsername($username);
        } catch (UserNotFoundException $e) {

            return new ErrorResponse($e->getMessage());
        }

        return new SuccessfulResponse([
            'username' => $user->username(),
            'name' => $user->name()->first() . ' ' . $user->name()->last(),
        ]);
    }

}