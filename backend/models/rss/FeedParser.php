<?php
/**
 * Created by PhpStorm.
 * User: autodesk
 * Date: 22.12.2017
 * Time: 1:37
 */

namespace app\models\rss;

use SimpleXMLElement;
use yii\db\Exception;

class FeedParser
{
    private $dom;

    /**
     * Parser constructor.
     * @param $xml
     */
    public function __construct($xml)
    {
        try {
            $this->dom = new SimpleXMLElement($xml);
        } catch (Exception $e) {
            var_dump($xml);
        }
        $this->dom = $this->dom->channel[0];
    }

    /**
     * @return \app\models\rss\ChannelParsingResult
     */
    public function parseChannel()
    {
        $parsingResult = new ChannelParsingResult();

        $parsingResult->setTitle($this->dom->title);
        $parsingResult->setLink($this->dom->link);
        $parsingResult->setDescription($this->dom->description);

        return $parsingResult;
    }

    public function parseArticles()
    {
        $items = [];
        foreach ($this->dom->item as $index => $item) {
            $items[$index] = new ArticlesParsingResultItem();
            $items[$index]->setTitle($item->title);
            $items[$index]->setText($item->description);
            if (isset($item->pubDate)) {
                $items[$index]->setPublicationDate(
                    date("D, d M Y H:i:s T",
                        strtotime($item->pubDate)
                    )
                );
            }

            if (isset($item->enclosure)
                && (strcmp($item->enclosure->type, 'image/jpg')
                    || strcmp($item->enclosure->type, 'image/png')
                )
            ) {
                $items[$index]->setImageURL($item->enclosure->url);
            }

        }
        return new ArticlesParsingResult($items);
    }


}
