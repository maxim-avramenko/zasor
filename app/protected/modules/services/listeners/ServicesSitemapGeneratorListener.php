<?php

use yupe\components\Event;

Yii::import('application.modules.services.models.Services');

/**
 * Class SitemapGeneratorListener
 */
class ServicesSitemapGeneratorListener
{
    /**
     * @param Event $event
     */
    public static function onGenerate(Event $event)
    {
        $generator = $event->getGenerator();

        $provider = new CActiveDataProvider(Services::model()->published()->public());

        foreach (new CDataProviderIterator($provider) as $item) {
            $generator->addItem(
                Yii::app()->createAbsoluteUrl('/services/services/view', ['path' => $item->path]),
                strtotime($item->update_time),
                SitemapHelper::FREQUENCY_WEEKLY,
                0.5
            );
        }
    }
}
