<?php
/**
 * Универсальный помощник для генерации alt-тегов
 * Работает для любых страниц Yupe CMS
 */
class UniversalAltHelper
{
    const BASE_ALT = 'Рекламное агентство полного цикла Галерея стиля - Казань';
    
    /**
     * Генерирует alt для услуг на основе названия
     */
    public static function generateServiceAlt($serviceTitle)
    {
        $pageContext = self::analyzeCurrentPage();
        return $serviceTitle . ' - ' . $pageContext . ' | ' . self::BASE_ALT;
    }
    
    /**
     * Генерирует alt для страниц/материалов
     */
    public static function generatePageAlt($pageTitle)
    {
        $pageContext = self::analyzeCurrentPage();
        return $pageTitle . ' - ' . $pageContext . ' | ' . self::BASE_ALT;
    }
    
    /**
     * Метод для клиентов
     */
    public static function generateClientAlt($clientNumber = null)
    {
        $pageContext = self::analyzeCurrentPage();
        
        if ($clientNumber) {
            return 'Клиент ' . $clientNumber . ' - ' . $pageContext . ' | ' . self::BASE_ALT;
        }
        
        return 'Наш клиент - ' . $pageContext . ' | ' . self::BASE_ALT;
    }
    
    /**
     * Метод для преимуществ
     */
    public static function generateAdvantageAlt($advantageTitle = null)
    {
        $pageContext = self::analyzeCurrentPage();
        
        if ($advantageTitle) {
            return 'Преимущество: ' . $advantageTitle . ' - ' . $pageContext . ' | ' . self::BASE_ALT;
        }
        
        return 'Наше преимущество - ' . $pageContext . ' | ' . self::BASE_ALT;
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
            'page' => 'Информационная страница'
        ];
        
        return isset($pageTypes[$action]) ? $pageTypes[$action] : 'Страница сайта';
    }
    
    /**
     * Универсальный метод для любых изображений
     */
    public static function generateAlt($title = null)
    {
        $pageContext = self::analyzeCurrentPage();
        
        if ($title) {
            return $title . ' - ' . $pageContext . ' | ' . self::BASE_ALT;
        }
        
        return 'Изображение - ' . $pageContext . ' | ' . self::BASE_ALT;
    }
}