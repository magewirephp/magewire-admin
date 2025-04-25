<?php
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Magewire\Mechanisms\ResolveComponents;

class ResolveComponentsViewModel extends \Magewirephp\Magewire\Mechanisms\ResolveComponents\ResolveComponentsViewModel
{
    public function doesPageHaveComponents(): bool
    {
        return true;
    }
}
