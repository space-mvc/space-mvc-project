<?php

namespace SpaceMvc\Framework\Library\Database\Mysql\Resource;

use SpaceMvc\Framework\Library\Database;
use SpaceMvc\Framework\Mvc\Model;

/**
 * Class Collection
 * @package SpaceMvc\Framework\Database\Mysql\Resource
 */
class Collection
{
    /** @var array $items */
    protected array $items = [];

    /**
     * @param Item $item
     */
    public function addItem(Model $item)
    {
        $this->items[] = $item;
    }

    /**
     * getItems
     * @return array
     */
    public function getItems() : array
    {
        return $this->items;
    }
}
