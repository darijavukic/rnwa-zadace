<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Traits\ApiResponser;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TitleController extends Controller
{
    use ApiResponser;

    public function create(Request $request) : JsonResponse {
        $attr = $request->validate([
            'type' => 'string|required|min:3|max:45',
        ]);

        $title = Title::create([
            'type' => $attr['name'],
        ]);

        return $this->success($title, 'Title created successfully');
    }

    public function index() {
        $titles = Title::all();

        return view('titles')->with('titles', $titles);
    }
}
