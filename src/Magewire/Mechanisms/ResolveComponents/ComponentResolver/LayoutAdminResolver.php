<?php
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Magewire\Mechanisms\ResolveComponents\ComponentResolver;

use Magewirephp\Magewire\Component;
use Magewirephp\Magewire\Mechanisms\HandleComponents\ComponentContext;
use Magewirephp\Magewire\Mechanisms\ResolveComponents\ComponentResolver\LayoutResolver;

class LayoutAdminResolver extends LayoutResolver
{
    protected function determineLayoutHandles(Component $component, ComponentContext $context): array
    {
        $handles = parent::determineLayoutHandles($component, $context);

        if (! in_array('default', $handles, true)) {
            $handles[] = 'default';
        }

        return $handles;
    }
}
