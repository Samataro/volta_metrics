<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Sajya\Server\Guide;

class JsonRpcController
{
    /**
     * @var Guide|null
     */
    protected ?Guide $guide;

    /**
     * Invoke the controller method.
     *
     * @param Request     $request
     * @param string[]    $procedures
     * @param null|string $delimiter
     *
     * @return JsonResponse
     */
    public function __invoke(Request $request, array $procedures, string $delimiter = null): JsonResponse
    {
        $guide = new Guide($procedures, $delimiter);

        $response = $guide->handle($request->getContent());

        return new JsonResponse($response);
    }
}