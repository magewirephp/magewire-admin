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
        /*
         * Temporary workaround to trick Magewire into believing there's always a component on the page.
         * This forces it to initialize all Containers, Mechanisms, and Features.
         *
         * Unlike themes like Hyvä, Magewire's JS is loaded in the <head> and at the top of the body.
         * This may change in the future, but it works for now.
         */
        return true;
    }
}
