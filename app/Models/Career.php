<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Career extends Model
{
    /** @use HasFactory<\Database\Factories\CareerFactory> */
    use HasFactory;

    public static array $experience = ['entry', 'intermediate', 'senior'];
    public static array $category = [
        'IT',
        'Finance',
        'Sales',
        'Marketing'
    ];

    public function scopeFilter(QueryBuilder|Builder $query, array $filters): QueryBuilder|Builder
    {
        return $query->when($filters['search'], function ($query, $search) {
            $query->where(function ($query) use ($search) {
                $query->where('title', 'like', '%' . $search . '%')
                    ->orWhere('description', 'like', '%' . $search . '%');
            });
        })->when($filters['min_salary'], function ($query, $min_salary) {
            $query->where('salary', '>=', $min_salary);
        })->when($filters['max_salary'], function ($query, $max_salary) {
            $query->where('salary', '<=', $max_salary);
        })->when($filters['experience'], function ($query, $experience) {
            $query->where('experience', $experience);
        })->when($filters['category'], function ($query, $category) {
            $query->where('category', $category);
        });
    }
}
