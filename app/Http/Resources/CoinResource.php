<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CoinResource extends JsonResource
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
            "id" => $this['id'],
            "name" => $this['name'],
            "symbol" => $this['symbol'],
            "slug" => $this['slug'],
            "date_added" => $this['date_added'],
            "platform_name" => $this['platform_name'],
            "platform_symbol" => $this['platform_symbol'],
            "platform_slug" => $this['platform_slug'],
            "token_address" => $this['token_address'],
            "last_updated" => $this['last_updated'],
        ];
    }
}
