<?php

namespace BasicApp\Themes\Bootstrap5;

use BasicApp\Theme\BaseTheme;

class Theme extends BaseTheme
{

    public function __construct(array $options = [])
    {
        parent::__construct($options);

        $this->addNamespace('BasicApp\Themes\Bootstrap5');
    }

}