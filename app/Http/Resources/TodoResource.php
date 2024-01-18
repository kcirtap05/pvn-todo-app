<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class TodoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        
        return [
           
            'id'=>$this->id,
            'first_name'=>$this->first_name,
            'image'=>$this->image,
            'birthday'=>$this->birthday,
            'date_hired'=>$this->date_hired,
            'mobile_number'=>$this->mobile_number,
            'tin'=>$this->tin,
            'sss'=>$this->sss,
            'pagibig_number'=>$this->pagibig_number,
            'status'=>$this->status,
            
            
        ];

        
    }
}
