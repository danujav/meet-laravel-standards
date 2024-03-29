<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePost;
use App\Models\Post;
use App\Services\PostService;
use App\Transformers\PostTransformer;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * @param PostService
     **/
    protected $postService;

    /**
     * @param PostService $postService
     **/
    public function __construct(PostService $postService)
    {
        $this->postService = $postService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $result = $this->postService->getAll();
        return fractal($result->unwrap(), new PostTransformer)->respond(200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse|string
     */
    public function store(StorePost $request)
    {
        $result = $this->postService->savePost($request);
        return fractal($result->unwrap(), new PostTransformer)->respond(200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(StorePost $request, $id)
    {
        $result = $this->postService->update($request, $id);
        return fractal($result->unwrap(), new PostTransformer)->respond(200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|\Prewk\Result\Ok|string
     */
    public function destroy($id)
    {
        $result = $this->postService->destroyPost($id);
        if($result > 0) {
            $data = [
                "message" => "Post Deleted!",
            ];
        } else {
            $data = [
                "message" => "Post Not Deleted!",
            ];
        }
        return response()->json($data);
    }
}
