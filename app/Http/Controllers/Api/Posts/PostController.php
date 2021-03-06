<?php

namespace App\Http\Controllers\Api\Posts;


use App\Http\Controllers\Controller;
use App\Models\Post;
use Freshbitsweb\Laratables\Laratables;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function adminIndex(Request $request)
    {
        return Laratables::recordsOf(Post::class);
    }
}
