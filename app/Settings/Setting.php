<?php

namespace App\Settings;

use Illuminate\Database\Eloquent\Model;
use Cache;

class Setting extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'settings';

    public static function get($setting, $default = null)
    {
        $s = self::where('setting', '=', $setting)->first();
        if (is_null($s))
        {
            if (is_null($default))
            {
                $default = 'default';
            }

            $s = new Setting;
            $s->setting = $setting;
            $s->value = $default;
            $s->user = 1; // TODO actual id for user -- later
            $s->save();
        }

        return $s->value;
    }
}
