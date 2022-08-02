<?php
declare(strict_types = 1);

namespace Sem\Grid\Api\Data;

interface GridInterface
{
    public const ENTITY_ID          = 'entity_id';
    public const PAGE_SIZE          = 'page_size';
    public const TITLE              = 'title';
    public const CONTENT            = 'content';
    public const FROM               = 'date_from';
    public const TO                 = 'date_to';

    /**
     * Get entity_id
     *
     * @return string|null
     */
    public function getEntityId(): ?string;

    /**
     * Set entity_id
     *
     * @param string $entityId
     *
     * @return GridInterface
     */
    // public function setEntityId(string $entityid): GridInterface;

    //  /**
    //  * Get first_name
    //  *
    //  * @return string|null
    //  */
    // public function getPageSize(): ?string;

    // /**
    //  * Set first_name
    //  *
    //  * @param string $firstName
    //  *
    //  * @return GridInterface
    //  */
    // public function setPageSize(string $page_size): GridInterface;

    // /**
    //  * Get last_name
    //  *
    //  * @return string|null
    //  */
    // public function getContent(): ?string;

    // /**
    //  * Set last_name
    //  *
    //  * @param string $lastName
    //  *
    //  * @return GridInterface
    //  */
    // public function setContent(string $content): GridInterface;

    // /**
    //  * Get title
    //  *
    //  * @return string|null
    //  */
    // public function getTitle(): ?string;

    // /**
    //  * Set title
    //  *
    //  * @param string $title
    //  *
    //  * @return GridInterface
    //  */
    // public function setTitle(string $title): GridInterface;

    // /**
    //  * Get from_date
    //  *
    //  * @return string|null
    //  */
    // public function getFrom(): ?string;

    // /**
    //  * Set date_from
    //  *
    //  * @param string $date_from
    //  *
    //  * @return GridInterface
    //  */
    // public function setFrom(string $date_from): GridInterface;

    // /**
    //  * Get date_to
    //  *
    //  * @return string|null
    //  */
    // public function getTo(): ?string;

    // /**
    //  * Set date_to
    //  *
    //  * @param string $date_to
    //  *
    //  * @return GridInterface
    //  */
    // public function setTo(string $date_to): GridInterface;
}