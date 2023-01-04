<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;

class StoreController extends Controller
{
    /**
     * @return array[]
     */
    public  function __invoke(StoreRequest $request): array
    {
        $data = $request->validated();
        $person = Person::create($data);
        return $data;
    }
}
