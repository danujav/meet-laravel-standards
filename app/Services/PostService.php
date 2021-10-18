<?php

namespace App\Services;

use App\Http\Requests\StorePost;
use App\Models\Post;
use App\Models\User;
use Illuminate\Session\Store;
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

    /**
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|Ok|string
     */
    public function destroyPost($id)
    {
        return Post::destroy($id);
    }

    /**
     * @param StorePost $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse|Ok|string
     */
    public function update(StorePost $request, $id)
    {
        $post = Post::find($id);
        $post->userId = $request->userId;
        $post->title = $request->title;
        $post->body = $request->body;

        $post->save();
        return new Ok($post);
    }
}
