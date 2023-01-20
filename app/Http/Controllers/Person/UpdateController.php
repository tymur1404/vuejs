<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Http\Requests\Person\UpdateRequest;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;

class UpdateController extends Controller
{
    /**
     * @param UpdateRequest $request
     * @return mixed
     */
    public  function __invoke(UpdateRequest $request, Person $person): mixed
    {
        $data = $request->validated();
        $person->update($data);
        return $data;
    }
}
