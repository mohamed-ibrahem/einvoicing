<?php

namespace App\Domains\Receipt\Http\Controllers;

use App\Domains\Receipt\Models\Document;
use App\Http\Controllers\Controller;

class GetAllController extends Controller
{
    public function __invoke()
    {
        Document::limit(10)->get();
    }
}
