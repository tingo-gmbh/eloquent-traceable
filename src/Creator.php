<?php

namespace Tingo\Traceable;

interface Creator
{
    /**
     * @return string
     */
    public function getCreatorEmail(): string;

    /**
     * @return string
     */
    public function getCreatorName(): string;
}