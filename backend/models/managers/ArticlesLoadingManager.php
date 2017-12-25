<?php

namespace app\models\managers;

/**
 * Created by PhpStorm.
 * User: autodesk
 * Date: 22.12.2017
 * Time: 4:39
 */

use app\models\Article;
use app\models\Channel;
use SimplePie;
use Yii;
use yii\helpers\StringHelper;

class ArticlesLoadingManager
{

    public function saveArticlesFromChannel($channelId)
    {
        $channel = Channel::findOne($channelId);

        $url = $channel->link;
        $feed = new SimplePie();
        $feed->set_feed_url($url);
        $feed->enable_cache(true);
        $feed->set_cache_location(Yii::getAlias('@app') . '/uploads/');
        $feed->set_cache_duration(1800);
        $feed->init();
        $feed->handle_content_type();
        $feed->set_timeout(10000);

        $itemQty = $feed->get_item_quantity();
        for ($i = 0; $i < $itemQty; $i++) {
            $item = $feed->get_item($i);

            if (Article::alreadyExists($item->get_title())) {
                continue;
            }

            $article = new Article();
            $article->publication_date = $item->get_date('Y-m-d H:i:s');
            $article->title = $item->get_title();
            $article->short_text = StringHelper::truncate($item->get_content(), 127);
            $article->full_text = $item->get_content();
            $article->image_small = $feed->get_image_url();
            $article->image_large = $feed->get_image_url();
            $article->source = $channelId;
            $article->hash = Article::calculateHash($item->get_title());
            $article->save(false);
        }
    }
}
