<?php

namespace SpaceMvc\Framework\Library\Database\Mysql;

use App\Model\User;
use SpaceMvc\Framework\Library\Database\Mysql;
use SpaceMvc\Framework\Library\Database\Mysql\Resource\Collection;
use SpaceMvc\Framework\Library\Database\Mysql\Resource\Item;

/**
 * Class QueryBuilder
 * @package SpaceMvc\Database\Mysql
 */
class QueryBuilder extends Mysql
{
    /** @var string $query */
    protected string $query;

    /**
     * QueryBuilder constructor.
     * @throws \Exception
     */
    public function __construct()
    {
        parent::__construct();
        $this->query = 'SELECT * FROM users';
    }

    /**
     * getQuery
     * @return string
     */
    public function getQuery(): string
    {
        return trim(preg_replace('/\s+/', ' ', $this->query));
    }

    /**
     * get
     * @return Collection
     */
    public function get(): Collection
    {
        $results = $this->fetchAll($this->query);
        $collection = new Collection();

        if(!empty($results)) {
            foreach($results as $result) {
                $item = new User();
                $item->setAttributes($result);
                $collection->addItem($item);
            }
        }

        return $collection;
    }

    /**
     * with
     * @param array $relationships
     * @return $this
     */
    public function with(array $relationships): self
    {
        return $this;
    }

    /**
     * select
     * @param string $table
     * @param array $fields
     * @return $this
     */
    public function select(string $table, array $fields = []): self
    {
        $this->query = 'SELECT ';

        if(!empty($fields)) {
            foreach($fields as $field) {
                $this->query .= $field.', ';
            }
            $this->query = rtrim($this->query, ', ');
        } else {
            $this->query .= ' * ';
        }
        $this->query .= ' FROM '.$table.' ';

        return $this;
    }

    /**
     * where
     * @param array $attributes
     * @return $this
     */
    public function where(array $attributes = []): self
    {
        if(!empty($attributes)) {

            $this->query .= ' WHERE ';

            foreach($attributes as $key => $value) {
                $this->query .= addslashes($key)." = '".addslashes($value)."' AND ";
            }

            $this->query = rtrim($this->query, " AND ");
        }

        return $this;
    }

    /**
     * whereLike
     * @param array $attributes
     * @return $this
     */
    public function whereLike(array $attributes = []): self
    {
        if(!empty($attributes)) {

            $this->query .= ' WHERE ';

            foreach($attributes as $key => $value) {
                $this->query .= addslashes($key)." LIKE '%".addslashes($value)."%' OR ";
            }

            $this->query = rtrim($this->query, " OR ");
        }

        return $this;
    }

    public function join()
    {

    }

    /**
     * limit
     * @param int $limit
     * @return $this
     */
    public function limit(int $limit = 50): self
    {
        $this->query.= ' LIMIT '.$limit;
        return $this;
    }

    /**
     * skip
     * @param int $offset
     * @return $this
     */
    public function skip(int $offset = 0)
    {
        $this->query.= ' OFFSET '.$offset;
        return $this;
    }

    /**
     * orderBy
     * @param array $attributes
     * @return $this
     */
    public function orderBy(array $attributes = []): self
    {
        if(!empty($attributes)) {

            $this->query .= ' ORDER BY ';

            foreach($attributes as $key => $direction) {
                $this->query .= addslashes($key)." ".$direction.", ";
            }

            $this->query = rtrim($this->query, ", ");
        }

        return $this;
    }
}