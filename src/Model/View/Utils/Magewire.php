<?php
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Model\View\Utils;

class Magewire extends \Magewirephp\Magewire\Model\View\Utils\Magewire
{
    public function getUpdateUri(): string
    {
        return '/backend' . parent::getUpdateUri();
    }
}
