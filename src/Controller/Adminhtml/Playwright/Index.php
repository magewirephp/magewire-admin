<?php

/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Controller\Adminhtml\Playwright;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magewirephp\MagewireAdmin\Controller\Adminhtml\MagewireDeveloperAction;

class Index extends MagewireDeveloperAction implements HttpGetActionInterface
{
    /**
     * The route remains admin-authenticated, but has a stable URL for browser tests.
     *
     * @var string[]
     */
    protected $_publicActions = ['index'];

    protected string $pageTitle = 'Magewire / Playwright';
}
