<?php

namespace App\Action;

use App\Enums\Priority;
use App\Http\Controllers\Api\ApiController;

class PriorityAction extends ApiController
{
    public function __invoke()
    {
        $priorities = Priority::getCollection();

        return $this->successJsonResponse(
            'Successfully retrieved priorities',
            $priorities,
            200
        );
    }
}
