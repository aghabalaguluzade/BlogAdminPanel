<?php

namespace App\Http\Resources\Api\V1;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'img' => config('subdomain.path') . $this->img,
            'content' => $this->content,
            'status' => $this->status,
            'slug' => $this->slug,
            'category_id' => $this->category->name,
            'view_count' => $this->view_count,
            'created_at' => $this->created_at->format('Y-m-d H:i:s'),    
            'tags' => TagResource::collection($this->tags), 
        ];
    }
}
