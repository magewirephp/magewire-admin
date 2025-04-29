<?php
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Magewire\Three;

use Magewirephp\Magewire\Component;

/**
 * Just for testing purposes.
 */
class Backend extends Component
{
    public string $message = '';

    public function click(): void
    {
        $this->message = 'NATIVE OUT OF THE BOX BACKEND SUPPORT !!!';
    }

    public function clear(): void
    {
        $this->message = '';
    }
}
