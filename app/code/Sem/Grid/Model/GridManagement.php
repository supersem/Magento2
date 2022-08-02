<?php
/**
 * Copyright ©  All rights reserved.
 * See COPYING.txt for license details.
 */
declare(strict_types=1);

namespace Sem\Grid\Model;

use Sem\Grid\Api\Data\GridInterface;
use Sem\Grid\Api\Data\GridInterfaceFactory;
use Sem\Grid\Api\Data\GridSearchResultsInterface;
use Sem\Grid\Api\Data\GridSearchResultsInterfaceFactory;
use Sem\Grid\Api\GridManagementInterface;
use Sem\Grid\Model\ResourceModel\Grid as ResourceGrid;
use Sem\Grid\Model\ResourceModel\Grid\CollectionFactory as GridCollectionFactory;
use Magento\Framework\Api\SearchCriteria\CollectionProcessorInterface;
use Magento\Framework\Exception\CouldNotDeleteException;
use Magento\Framework\Exception\CouldNotSaveException;
use Magento\Framework\Exception\NoSuchEntityException;

class GridManagement implements GridManagementInterface
{

    /**
     * {@inheritdoc}
     */

    protected $entityFactory;

    /**
     * @var GridCollectionFactory
     */
    protected $gridCollectionFactory;

    /**
     * @var ResourceGrid
     */
    protected $resource;

    /**
     * @var CollectionProcessorInterface
     */
    protected $collectionProcessor;

    /**
     * @var Grid
     */
    protected $searchResultsFactory;

    /**
     * @param ResourceGrid                      $resource
     * @param GridInterfaceFactory              $entityFactory
     * @param GridCollectionFactory             $gridCollectionFactory
     * @param GridSearchResultsInterfaceFactory $searchResultsFactory
     * @param CollectionProcessorInterface      $collectionProcessor
     */
    public function __construct(
        ResourceGrid $resource,
        GridInterfaceFactory $entityFactory,
        GridCollectionFactory $gridCollectionFactory,
        GridSearchResultsInterfaceFactory $searchResultsFactory,
        CollectionProcessorInterface $collectionProcessor
    ) {
        $this->resource = $resource;
        $this->entityFactory = $entityFactory;
        $this->gridCollectionFactory = $gridCollectionFactory;
        $this->searchResultsFactory = $searchResultsFactory;
        $this->collectionProcessor = $collectionProcessor;
    }

    public function get(string $entityId): GridInterface
    {
        $entity = $this->entityFactory->create();
        $this->resource->load($entity, $entityId);
        if (!$entity->getId()) {
            throw new NoSuchEntityException(__('Entity does not exist.', $entityId));
        }

        return $entity;
    }

    public function getList(
        \Magento\Framework\Api\SearchCriteriaInterface $criteria
    ): GridSearchResultsInterface {
        $collection = $this->gridCollectionFactory->create();

        $this->collectionProcessor->process($criteria, $collection);

        $searchResults = $this->searchResultsFactory->create();
        $searchResults->setSearchCriteria($criteria);

        $items = [];
        foreach ($collection as $model) {
            $items[] = $model;
        }

        $searchResults->setItems($items);
        $searchResults->setTotalCount($collection->getSize());

        return $searchResults;
    }
}