<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class SupportResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        //dd($this->replies);
        return [
            'id' => $this->id,
            'status' => $this->status,
            'label' => $this->statusOptions[$this->status], //Recuperando o label la da model baseado na chave do status
            'description' => $this->description ,
            'user' => new UserResource($this->user), // quem e o usuario que criou esse suporte
            'lesson' => new LessonResource($this->lesson), // qua a lição que essa suporte está relacionado
            
            'replies' => ReplySupportResource::collection($this->replies), // colecao ja q sao varias respostas
            'dt_updated'=> Carbon::make($this->updated_at)->format('Y-m-d H:i:s'), 
        ];  
    }
}
