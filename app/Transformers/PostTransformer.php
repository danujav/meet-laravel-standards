<?php

namespace App\Transformers;

use App\Models\Post;
use League\Fractal\TransformerAbstract;

class PostTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param Post $post
     * @return array
     */
    public function transform(Post $post)
    {
        return [
            'userId' => $post->userId,
            'id' => $post->id,
            'title' => $post->title,
            'body' => $post->body
        ];
    }
}
