<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\StoreRequest;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;

class StoreController extends Controller
{
    /**
     * @param StoreRequest $request
     * @return Collection
     */
    public  function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $person = Person::create($data);
        return $person;
    }
}
