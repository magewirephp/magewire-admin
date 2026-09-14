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

class Ui extends MagewireDeveloperAction implements HttpGetActionInterface
{
    /**
     * Keep the developer-only route stable for authenticated browser tests.
     *
     * @var string[]
     */
    protected $_publicActions = ['ui'];

    protected string $pageTitle = 'Magewire / Playwright / UI';
}
