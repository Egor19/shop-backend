<?php

namespace App\Filters;
use Illuminate\Support\Facades\Log;

class ProductFilter extends QueryFilter{
    public function name($name = null){
        return $this->builder->where('name', $name);
        }

    public function processor($processor = null){
            return $this->builder->where('processor', $processor);
            }

        public function memory_capacity($memory_capacity = null){
            return $this->builder->where('memory_capacity', $memory_capacity);
                }

        public function video_card($video_card = null){
            return $this->builder->where('video_card', $video_card);
                    }
    

    public function search_field($search_string = ''){
        return $this->builder
            ->where('title', 'LIKE', '%'.$search_string.'%')
            ->orWhere('description', 'LIKE', '%'.$search_string.'%');
    }
}
