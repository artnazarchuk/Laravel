<?php

namespace App\Contracts;

use Laravel\Socialite\Contracts\User as BaseContract;

interface Social
{
    /**
     * @param BaseContract $socialUser
     * @return string $network
     * @return string
     */
    public function loginUser(BaseContract $socialUser, string $network): string;
}