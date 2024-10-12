<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;
use App\Http\Resources\ProjectResource;

class TaskResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'image_path' => $this->image_path,
            'status' => $this->status,
            'priority' => $this->priority,
            'due_date' =>  (new Carbon($this->created_at))->format('Y-m-d'),
            'created_at' => (new Carbon($this->created_at))->format('Y-m-d'),
            'updated_at' =>(new Carbon($this->updated_at))->format('Y-m-d'),
            'createdBy' => new ProjectResource($this->createdBy),
            'updatedBy' => new ProjectResource($this->updatedBy),
            'assignedUser' => $this->assignedUse ?  new ProjectResource($this->assignedUser) : null,
            'project' => new ProjectResource($this->project),
        ];
    }
}
