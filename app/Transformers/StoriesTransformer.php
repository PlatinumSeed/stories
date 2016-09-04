<?php
namespace App\Transformers;
use App\Story;
use League\Fractal\TransformerAbstract;

class StoriesTransformer extends TransformerAbstract
{
    public function transform(Story $story)
    {
        return [
            'id'        => (int) $story->id,
            'title'     => ucwords($story->title),
            'synopsis'  => ucfirst($story->synopsis),
            'author'    => ucfirst($story->user->first_name) . ' ' . ucfirst($story->user->last_name),
            'story_type_id' => $story->story_type_id,
            'fragments' => $story->fragments()->get()
        ];
    }
}
