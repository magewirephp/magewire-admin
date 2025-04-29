<?php
/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Plugin\Magento\Framework\View\Page\Config;

use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Page\Config\Renderer as Subject;

class Renderer
{
    public function __construct(
        private readonly LayoutInterface $layout
    ) {
        //
    }

    public function afterRenderAssets(Subject $subject, string $result): string
    {
        $head = $this->layout->getBlock('magewire.head');

        if ($head) {
            $html = $head->toHtml();

            return preg_replace('/(<script\b[^>]*>)/i', $head->toHtml() . '$1', $result, 1);
        }

        return $result;
    }
}
