<?php
/**
 * Универсальный помощник для генерации title-атрибутов ссылок
 */
class UniversalTitleHelper
{
    const BASE_SITE = 'Галерея стиля';
    const BASE_REGION = 'Казань';
    
    /**
     * Генерирует title для ссылок меню
     */
    public static function generateMenuTitle($linkText, $linkUrl = null)
    {
        $pageContext = self::analyzeCurrentPage();
        $linkType = self::analyzeLinkType($linkUrl, $linkText);
        
        $templates = [
            'main' => 'Перейти на главную страницу | Рекламное агентство полного цикла ' . self::BASE_SITE . ' - ' . self::BASE_REGION,
            'internal' => $linkText . ' - ' . $pageContext . ' | Рекламное агентство полного цикла ' . self::BASE_SITE . ' - ' . self::BASE_REGION,
            'external' => $linkText . ' - внешний ресурс | ' . self::BASE_SITE . ' - ' . self::BASE_REGION,
            'phone' => 'Позвонить в ' . self::BASE_SITE . ' по номеру ' . $linkText . ' | ' . self::BASE_REGION,
            'email' => 'Написать письмо в ' . self::BASE_SITE . ' | ' . $linkText,
            'default' => $linkText . ' | Рекламное агентство полного цикла ' . self::BASE_SITE . ' - ' . self::BASE_REGION
        ];
        
        return $templates[$linkType];
    }
    
    /**
     * Анализ типа ссылки
     */
    private static function analyzeLinkType($url, $text)
    {
        if (empty($url) || $url == '/' || $url == '#') {
            return 'main';
        }
        
        // Телефонные ссылки
        if (preg_match('/^tel:\+/', $url) || preg_match('/^\+7|8\s?\(\d{3}\)/', $text)) {
            return 'phone';
        }
        
        // Email ссылки
        if (preg_match('/^mailto:/', $url) || filter_var($text, FILTER_VALIDATE_EMAIL)) {
            return 'email';
        }
        
        // Внешние ссылки
        if (preg_match('/^(http|https):\/\//', $url) && !preg_match('/gs-kzn\.ru/', $url)) {
            return 'external';
        }
        
        // Внутренние ссылки
        return 'internal';
    }
    
    /**
     * Специальный метод для социальных сетей
     */
    public static function generateSocialTitle($socialName, $socialType = null)
    {
        $socialNames = [
            'vk' => 'ВКонтакте',
            'telegram' => 'Telegram',
            'whatsapp' => 'WhatsApp',
            'youtube' => 'YouTube',
            'instagram' => 'Instagram',
            'facebook' => 'Facebook',
            'twitter' => 'Twitter',
            '2gis' => '2GIS',
            'yandex' => 'Яндекс'
        ];
        
        $socialTitle = isset($socialNames[strtolower($socialName)]) ? 
            $socialNames[strtolower($socialName)] : $socialName;
            
        return 'Мы в ' . $socialTitle . ' | Рекламное агентство полного цикла ' . self::BASE_SITE . ' - ' . self::BASE_REGION;
    }
    
    /**
     * Анализ текущей страницы
     */
    private static function analyzeCurrentPage()
    {
        if (!Yii::app() || !Yii::app()->controller) {
            return 'Страница сайта';
        }
        
        $controller = Yii::app()->controller;
        $action = $controller->action ? $controller->action->id : 'index';
        $module = $controller->module ? $controller->module->id : null;
        
        $pageTypes = [
            'index' => 'Главная страница',
            'view' => 'Страница материала',
            'services' => 'Услуги',
            'portfolio' => 'Портфолио',
            'about' => 'О компании',
            'contact' => 'Контакты',
            'news' => 'Новости',
            'page' => 'Информационная страница',
            'gallery' => 'Галерея'
        ];
        
        return isset($pageTypes[$action]) ? $pageTypes[$action] : 'Страница сайта';
    }
}