<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'key',
        'value',
    ];

    public function get($key)
    {
        return $this->where('key', $key)->first()->value;
    }

    public function set($key, $value)
    {
        return $this->where('key', $key)->update(['value' => $value]);
    }
}
