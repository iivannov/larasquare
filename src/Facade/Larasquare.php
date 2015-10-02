<?php

namespace Iivannov\Larasquare\Facade;

use Illuminate\Support\Facades\Facade;

/**
 * @see Iivannov\Larasquare\Foursquare
 */
class Larasquare extends Facade {

    protected static function getFacadeAccessor() { return 'larasquare'; }

}