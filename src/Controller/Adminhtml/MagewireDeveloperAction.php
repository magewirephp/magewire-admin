<?php

/**
 * Copyright © Willem Poortman 2021-present. All rights reserved.
 *
 * Please read the README and LICENSE files for more
 * details on copyrights and license information.
 */

declare(strict_types=1);

namespace Magewirephp\MagewireAdmin\Controller\Adminhtml;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Backend\Model\View\Result\Forward;
use Magento\Backend\Model\View\Result\ForwardFactory;
use Magento\Framework\App\State as ApplicationState;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

abstract class MagewireDeveloperAction extends Action
{
    protected string $pageTitle = 'Magewire / Developer / Action';

    private Page|null $page = null;

    public function __construct(
        Context $context,
        private readonly PageFactory $pageFactory,
        private readonly ForwardFactory $resultForwardFactory,
        private readonly ApplicationState $applicationState
    ) {
        parent::__construct($context);
    }

    public function execute(): Page|Forward
    {
        if ($this->applicationState->getMode() === ApplicationState::MODE_PRODUCTION) {
            return $this->resultForwardFactory->create()->forward('noroute');
        }

        return $this->page();
    }

    protected function page(): Page
    {
        $page = $this->page ??= $this->pageFactory->create();
        $page->getConfig()->getTitle()->set($this->pageTitle);

        return $page;
    }
}
