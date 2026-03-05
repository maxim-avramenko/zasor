# Справка PSR-1 / PSR-12

## Таблица соответствия

| Элемент | PSR-1 / PSR-12 | Пример |
|---------|----------------|--------|
| Класс | PascalCase | `NewsController`, `FeedBack` |
| Метод | camelCase | `actionView`, `getRules` |
| Константа | UPPER_SNAKE_CASE | `STATUS_PUBLISHED`, `BASE_ALT` |
| Свойство | camelCase или $_ snake_case (PSR не фиксирует) | `$pageContext`, `$userName` |
| Ключевые слова | lowercase | `true`, `false`, `null`, `if`, `for` |
| Типы | lowercase, короткие | `bool`, `int`, `array`, `string` |

## Пример контроллера (PSR)

```php
<?php

namespace application\modules\news\controllers;

use yupe\components\controllers\FrontController;

class NewsController extends FrontController
{
    public function actionView($slug)
    {
        $model = News::model()->published()->find('slug = :slug', [':slug' => $slug]);

        if (!$model) {
            throw new \CHttpException(404, 'Not found');
        }

        $this->render('view', ['model' => $model]);
    }
}
```

## Пример модели (PSR)

```php
<?php

namespace application\modules\feedback\models;

use yupe\models\YModel;

class FeedBack extends YModel
{
    const STATUS_NEW = 0;
    const STATUS_PROCESS = 1;

    public function tableName(): string
    {
        return '{{feedback_feedback}}';
    }

    public function rules(): array
    {
        return [
            ['email, name, body', 'required'],
            ['email', 'email'],
        ];
    }

    public function behaviors(): array
    {
        return array_merge(parent::behaviors(), [
            'timestamp' => [
                'class' => 'zii.behaviors.CTimestampBehavior',
            ],
        ]);
    }
}
```

## Пример хелпера (PSR)

```php
<?php

namespace application\components;

class UniversalAltHelper
{
    const BASE_ALT = 'Рекламное агентство - Казань';

    public static function generateAlt(?string $title = null): string
    {
        $pageContext = self::analyzeCurrentPage();

        if ($title) {
            return $title . ' - ' . $pageContext . ' | ' . self::BASE_ALT;
        }

        return 'Изображение - ' . $pageContext . ' | ' . self::BASE_ALT;
    }

    private static function analyzeCurrentPage(): string
    {
        if (!\Yii::app() || !\Yii::app()->controller) {
            return 'Страница сайта';
        }

        $action = \Yii::app()->controller->action
            ? \Yii::app()->controller->action->id
            : 'index';

        $pageTypes = [
            'index' => 'Главная страница',
            'view' => 'Страница материала',
        ];

        return $pageTypes[$action] ?? 'Страница сайта';
    }
}
```

## Порядок объявлений в файле

1. Docblock файла (если есть)
2. `declare` (если есть)
3. `namespace`
4. `use` (импорты)
5. Пустая строка
6. Класс/интерфейс/трейт

## Ссылки

- [PSR-1: Basic Coding Standard](https://www.php-fig.org/psr/psr-1/)
- [PSR-12: Extended Coding Style](https://www.php-fig.org/psr/psr-12/)
