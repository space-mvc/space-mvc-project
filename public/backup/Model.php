<?php
//
//namespace SpaceMvc\Framework\Mvc;
//
//use SpaceMvc\Framework\Library\Database;
//use SpaceMvc\Framework\Mvc\Abstract\ModelAbstract;
//use SpaceMvc\Framework\Library\Database\Mysql\Resource\Item;
//
///**
// * Class Model
// * @package SpaceMvc\Framework\Mvc
// */
//class Model extends ModelAbstract
//{
//    /**
//     * getTable
//     * @return string
//     */
//    public function getTable(): string
//    {
//        return $this->table;
//    }
//
//    /**
//     * setTable
//     * @param string $table
//     */
//    public function setTable(string $table): void
//    {
//        $this->table = $table;
//    }
//
//    /**
//     * getFillable
//     * @return array
//     */
//    public function getFillable(): array
//    {
//        return $this->fillable;
//    }
//
//    /**
//     * setFillable
//     * @param array $fillable
//     */
//    public function setFillable(array $fillable): void
//    {
//        $this->fillable = $fillable;
//    }
//
//    /**
//     * setAttribute
//     * @param $key
//     * @param $value
//     */
//    public function setAttribute($key, $value)
//    {
//        $this->attributes[$key] = $value;
//    }
//
//    /**
//     * save
//     * @return mixed
//     */
//    public function save()
//    {
//        $database = new Database();
//        $attributes = array_filter($this->attributes);
//        $db = $database->getMysql();
//        $id = !empty($attributes['id']) ? $attributes['id'] : 0;
//        $db->update($this->table, $id, $attributes);
//        $this->saved = true;
//        return $this;
//    }
//
//    /**
//     * getConn
//     * @return mixed
//     */
//    public static function getConn(): mixed
//    {
//        return new Database\Mysql\QueryBuilder();
//    }
//
//    /**
//     * with
//     * @param array $relationships
//     * @return mixed
//     */
//    public static function with(array $relationships)
//    {
//        return self::getConn()->with($relationships);
//    }
//
//    /**
//     * @return array
//     */
//    public function getAttributes(): array
//    {
//        return $this->attributes;
//    }
//
//    /**
//     * @param array $attributes
//     */
//    public function setAttributes(array $attributes): void
//    {
//        $this->attributes = $attributes;
//    }
//
//    /**
//     * __get
//     * @param $key
//     * @return mixed
//     */
//    public function __get($key)
//    {
//        if(!isset($this->attributes[$key])) {
//            throw new \Exception($key.' key is not a valid model attribute');
//        }
//
//        return $this->attributes[$key];
//    }
//
//    /**
//     * __set
//     * @param $key
//     * @param $value
//     */
//    public function __set($key, $value)
//    {
//        if(!in_array($key, $this->fillable)) {
//            throw new \Exception($key.' key is not in the fillable array');
//        }
//        return $this->setAttribute($key, $value);
//    }
//
//
////
////    /**
////     * find
////     * @param $id
////     * @return mixed
////     */
////    public static function find($id): mixed
////    {
////        $result = self::getConn()->find(static::$table, $id);
////        $item = new Item;
////        $item->setTable(static::$table);
////        $item->setFillable(static::$fillable);
////
////        if(!empty($result)) {
////            $item->setAttributes($result);
////        }
////        return $item;
////    }
////
////    /**
////     * select
////     * @param array $fields
////     * @return mixed
////     */
////    public static function select($fields = []): mixed
////    {
////        return self::getConn()->select(static::$table, $fields);
////    }
////
////    /**
////     * insert
////     * @param array $fields
////     * @return mixed
////     */
////    public static function insert(array $fields): mixed
////    {
////        return self::getConn()->insert(static::$table, $fields);
////    }
////
////    /**
////     * create
////     * @param array $fields
////     * @return mixed
////     */
////    public static function create(array $fields): mixed
////    {
////        return self::insert($fields);
////    }
////
////    /**
////     * update
////     * @param array $fields
////     * @return mixed
////     */
////    public static function update(int $id, array $data): mixed
////    {
////        return self::getConn()->update(static::$table, $id, $data);
////    }
//
//}
