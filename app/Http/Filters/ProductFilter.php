<?php

namespace App\Http\Filters;

use App\Http\Filters\AbstractFilter;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Facades\Log;

class ProductFilter extends AbstractFilter{

      const CATEGORIES = 'categories';
      const COLORS = 'colors';
      const PRICES = 'prices';
      const TAGS = 'tags';

      protected function getCallbacks(): array
      {
        return
        [
            self::CATEGORIES => [$this, 'categories'],
            self::COLORS => [$this, 'colors'],
            self::PRICES => [$this, 'prices'],
            self::TAGS => [$this, 'tags'],
        ];
      }

      protected function categories(Builder $builder, $value){
        Log::info('category', ['value' => $value]);
        $builder->where('category_id', $value);
      }

      protected function colors(Builder $builder, $value){

        $builder->whereHas('colors', function ($query) use ($value) {
          $query->where('color_id', $value);
      });

      }

      protected function prices(Builder $builder, $value){
Log::info('price', [$value['min'], $value['max']]);
        $builder->whereBetween('price', [$value['min'], $value['max']]);
        
      }

      protected function tags(Builder $builder, $value){

        $builder->whereHas('tags', function ($b) use ($value){
            $b->whereIn('tag_id', $value);
        });
        
      }


}
