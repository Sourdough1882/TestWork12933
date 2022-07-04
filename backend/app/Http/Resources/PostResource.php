<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'header' => $this->header,
            'body' => $this->body,
            'media' => $this->media,
            'slug' => $this->slug,
            'comments' => CommentResource::collection($this->comments),
            'upvotes' => $this->upvotes,
            'downvotes' => $this->downvotes,
            'author' => $this->author,
            'created_at' => $this->created_at->diffForHumans(),
            'updated_at' => $this->updated_at,
        ];
    }
}
