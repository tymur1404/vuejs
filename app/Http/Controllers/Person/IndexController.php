<?php

namespace App\Http\Controllers\Person;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Database\Eloquent\Collection;

class IndexController extends Controller
{
    /**
     * @return Collection
     */
    public  function __invoke(): Collection
    {
        $people = Person::all();
        return $people;
    }
}
