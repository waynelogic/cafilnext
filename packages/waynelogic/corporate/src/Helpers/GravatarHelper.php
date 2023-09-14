<?php

namespace Waynelogic\Corporate\Helpers;

class GravatarHelper
{
    const DEFAULT_GRAVATAR = '';
    const DEFAULT_404 = '404';
    const DEFAULT_MYSTERYMAN = 'mm';
    const DEFAULT_ABSTRACT = 'identicon';
    const DEFAULT_FACE = 'wavatar';
    const DEFAULT_MONSTER = 'monsterid';
    const DEFAULT_RETRO = 'retro';
    const DEFAULT_BLANK = 'blank';

    public static function get($email, $width=0, $default=self::DEFAULT_GRAVATAR) : string
    {
        $id = md5(strtolower(trim($email)));
        $default = '?d=' . urlencode($default);
        $width = $width ? '&amp;s=' . $width : '';
        return 'https://www.gravatar.com/avatar/' . $id . $default . $width;
    }
}
