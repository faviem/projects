<?php

namespace BZ\UserBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class BZUserBundle extends Bundle
{
    public function getParent()
    {
      return 'FOSUserBundle';
    }
}
