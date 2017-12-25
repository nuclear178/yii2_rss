<?php
/**
 * Created by PhpStorm.
 * User: autodesk
 * Date: 22.12.2017
 * Time: 2:02
 */

namespace app\models\rss;

use Iterator;

class ArticlesParsingResult implements Iterator
{
    private $position = 0;
    private $dataSet;

    /**
     * ArticlesParsingResult constructor.
     * @param $dataSet
     */
    public function __construct($dataSet)
    {
        $this->position = 0;
        $this->dataSet = $dataSet;
    }

    public function current()
    {
        return $this->dataSet[$this->position];
    }

    public function next()
    {
        ++$this->position;
    }

    public function key()
    {
        return $this->position;
    }

    public function valid()
    {
        return isset($this->dataSet[$this->position]);
    }

    public function rewind()
    {
        $this->position = 0;
    }

}