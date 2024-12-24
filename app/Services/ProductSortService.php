<?php
namespace App\Services;

use Illuminate\Support\Facades\Log;

class ProductSortService
{
    /**
     * Применяет сортировку к запросу.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param string|null $sortBy
     * @param string|null $sortOrder
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function applySorting($query, $sortBy = 'title', $sortOrder = 'asc')
    {
        Log::info('Sorting by field and order:', [$sortBy, $sortOrder]);

        // Проверка на допустимые значения сортировки
        $validSortFields = ['title', 'price'];

        if (in_array($sortBy, $validSortFields)) {
            return $query->orderBy($sortBy, $sortOrder);
        }

        // Если параметр сортировки не допустим, сортируем по умолчанию
        return $query->orderBy('title', 'asc');
    }
}