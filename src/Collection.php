<?php
/**
 * @author Matias Pino <pnoexz@gmail.com>
 * @license GPL v3.0
 */

namespace Pnoexz;

class Collection implements
    \Iterator,
    \Countable,
    \ArrayAccess
{
    /** @var array */
    protected $data = [];

    /** @var int */
    protected $position =  0;

    /**
     * Collection constructor.
     * @param array $items
     */
    public function __construct(array $items)
    {
        foreach ($items as $key => $value) {
            $this->data[$key] = $value;
        }
    }

    /***************************************************************************
     * Iterator interface
     **************************************************************************/

    /**
     * @return void
     */
    public function rewind()
    {
        $this->position = 0;
    }

    /**
     * @return mixed
     */
    public function current()
    {
        return $this->data[$this->position];
    }

    /**
     * @return int
     */
    public function key()
    {
        return $this->position;
    }

    /**
     * @return void
     */
    public function next()
    {
        ++$this->position;
    }

    /**
     * @return bool
     */
    public function valid()
    {
        return isset($this->data[$this->position]);
    }

    /***************************************************************************
     * Countable interface
     **************************************************************************/

    /**
     * @return int
     */
    public function count()
    {
        return count($this->data);
    }

    /***************************************************************************
     * ArrayAccess interface
     **************************************************************************/

    /**
     * @param mixed $offset
     * @param mixed $value
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->data[] = $value;
        } else {
            $this->data[$offset] = $value;
        }
    }

    /**
     * @param mixed $offset
     * @return bool
     */
    public function offsetExists($offset)
    {
        return isset($this->data[$offset]);
    }

    /**
     * @param mixed $offset
     */
    public function offsetUnset($offset)
    {
        unset($this->data[$offset]);
    }

    /**
     * @param mixed $offset
     * @return mixed|null
     */
    public function offsetGet($offset)
    {
        return isset($this->data[$offset]) ? $this->data[$offset] : null;
    }
}
