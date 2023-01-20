<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;

class DeleteController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @return mixed
     */
    public  function __invoke(Person $person): mixed
    {
        $person->delete();
        return response([]);
    }
}
