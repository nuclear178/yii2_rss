<?php
/**
 * Created by PhpStorm.
 * User: autodesk
 * Date: 22.12.2017
 * Time: 2:23
 */

namespace app\models\rss;

class ArticlesParsingResultItem
{
    private $title;
    private $text;
    private $publicationDate;
    private $imageURL;
    private $source; //todo: remove

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param mixed $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * @return mixed
     */
    public function getPublicationDate()
    {
        return $this->publicationDate;
    }

    /**
     * @param mixed $publicationDate
     */
    public function setPublicationDate($publicationDate)
    {
        $this->publicationDate = $publicationDate;
    }

    /**
     * @return mixed
     */
    public function getImageURL()
    {
        return $this->imageURL;
    }

    /**
     * @param mixed $imageURL
     */
    public function setImageURL($imageURL)
    {
        $this->imageURL = $imageURL;
    }

    /**
     * @return mixed
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param mixed $source
     */
    public function setSource($source)
    {
        $this->source = $source;
    }

    public function __toString()
    {
        return 'title: ' . $this->title . PHP_EOL
            . 'text: ' . $this->text . PHP_EOL
            . 'publicationDate: ' . $this->publicationDate . PHP_EOL
            . 'imageURL: ' . $this->imageURL;
    }


}