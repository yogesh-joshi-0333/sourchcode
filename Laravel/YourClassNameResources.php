<?php

namespace App\Http\Resources\V1\User;

use App\Services\ActivityService;
use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class YourClassNameResources extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => encryptId($this->id),
            'responseKey' => encryptId($this->category_id),
            'responseKey' => $this->category_name,
            'responseKey' => $this->name ?? '',
            'responseKey' => $this->colorcode ?? '',
            'responseKey' => $this->image_url ?? '',
            'responseKey' => $this->price,
            'responseKey' => $this->yourFunction($this->id),
        ];
    }
    private function yourFunction($someparam)
    {
        $YourService = new YourService;
        $data = $YourService->yourServiceFunction($someparam);
        $sum = $data->pluck('numberField')->sum();

        return $sum;
    }

}
