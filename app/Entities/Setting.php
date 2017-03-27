<?php

namespace App\Entities;

use App\Entities\Traits\Cachable;
use Cache;

class Setting extends BaseModel
{
    use Cachable;

    protected $fillable = ['name', 'value', 'description', 'is_autoload'];

    protected $casts = [
        'is_autoload' => 'boolean',
    ];

    protected function clearCache()
    {
        if ($this->is_autoload) {
            Cache::forget('setting_autoload');
        } else {
            Cache::forget('setting_' . $this->name);
        }
    }

    public static function allSetting()
    {
        return Cache::rememberForever('setting_autoload', function () {
            return static::where('is_autoload', true)
                ->recent()
                ->get()
                ->keyBy('name');
        });
    }

    public static function getSetting($name)
    {
        $value = static::allSetting()->get($name);
        if (is_null($value)) {
            $value = Cache::rememberForever('setting_' . $name, function () use ($name) {
                return static::where('name', $name)->first();
            });
        }
        return $value;
    }
}
