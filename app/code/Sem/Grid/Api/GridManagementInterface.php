<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sem\Grid\Api;

use Magento\Framework\Api\SearchCriteriaInterface;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\NoSuchEntityException;
use Sem\Grid\Api\Data\GridInterface;
use Sem\Grid\Api\Data\GridSearchResultsInterface;

interface GridManagementInterface
{

    /**
     * GET for Grid api
     * @param string $param
     * @return string
     */
    public function getList(SearchCriteriaInterface $searchCriteria): GridSearchResultsInterface;

    /**
     * Retrieve Grid
     *
     * @param string $entityId
     *
     * @return GridInterface
     * @throws LocalizedException
     */
    public function get(string $entityId): GridInterface;

}
