<?php

namespace App\Models\Traits;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Log;

trait Sortable
{
    /**
     * Применить сортировку к запросу.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSort(Builder $query, Request $request)
    {
       
        // Получаем список сортируемых колонок, определенных в модели
        $sortables = $this->sortables ?? [];

        // Получаем колонку для сортировки
        $sort = $request->get('sort');

        // Получаем направление сортировки (по умолчанию по убыванию)
        $direction = $request->get('direction', 'asc');

        // Проверяем, что колонка для сортировки входит в список сортируемых колонок модели
        // и что направление сортировки является допустимым значением
     //   Log::info('i am here', ['sort' => $sort]);
        if ($sort && in_array($sort, $sortables) && in_array($direction, ['asc', 'desc'])) {
            Log::info('i am here', ['sort' => $sort]);
            return $query->orderBy($sort, $direction);
        }

        // Если сортировка не требуется, возвращаем запрос как есть
        return $query;
    }
}
