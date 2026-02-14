<?php

/**
 * Class StoreCategoryRepository
 */
class ServicePathRepository extends CApplicationComponent
{
    /**
     * @param $slug
     */
    public function getByAlias($slug)
    {
        return Services::model()->published()->find(
            'slug = :slug',
            [
                ':slug' => $slug,
            ]
        );
    }


    public function getByPath($path)
    {
        return Services::model()->findByPath($path);
    }
}