<?php

namespace App\Services;

class BaseService
{
    private $request;

    public static function makeFrom(Request $request)
    {
        return (new self())->withRequest($request);
    }

    public function withRequest(Request $request)
    {
        $this->request = $request;

        return $this;
    }
}
