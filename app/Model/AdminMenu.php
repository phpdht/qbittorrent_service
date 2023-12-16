<?php

declare(strict_types=1);

namespace App\Model;



/**
 * @property int $id 
 * @property int $parent_id 
 * @property int $order 
 * @property string $title 
 * @property string $icon 
 * @property string $uri 
 * @property string $extension 
 * @property int $show 
 * @property \Carbon\Carbon $created_at 
 * @property \Carbon\Carbon $updated_at 
 */
class AdminMenu extends Model
{
    /**
     * The table associated with the model.
     */
    protected ?string $table = 'admin_menu';

    /**
     * The attributes that are mass assignable.
     */
    protected array $fillable = [];

    /**
     * The attributes that should be cast to native types.
     */
    protected array $casts = ['id' => 'integer', 'parent_id' => 'integer', 'order' => 'integer', 'show' => 'integer', 'created_at' => 'datetime', 'updated_at' => 'datetime'];
}
