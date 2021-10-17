<?php

namespace App\Services;

use App\Http\Requests\StorePost;
use App\Models\Post;
use Illuminate\Support\Facades\DB;
use Prewk\Result\Ok;

class PostService
{
    /**
     * @param StorePost $request
     * @return \Illuminate\Http\JsonResponse|Ok|string
     */
    public function savePost($request)
    {
        /*we can use Mass Assignment instead of above steps.
                              This one is best practice for save MODEL.*/
            $create = Post::create($request->all());
            return new Ok($create);
    }
}
