<?php

namespace App\Contracts;

interface Parser
{
    /**
    * @param string $link
    * @return $this
    */
    public function load(string $link): self;

    /**
     * @return void
     */
    public function start(): void;
}