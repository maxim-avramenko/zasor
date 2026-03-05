---
name: php74-psr
description: Генерирует PHP 7.4 код с соблюдением PSR-1 и PSR-12. Использовать при написании PHP кода для Yii 1.1, Yupe CMS, или когда пользователь просит код по PSR.
---

# PHP 7.4 + PSR для Yii 1.1

## Назначение

Применять при генерации PHP-кода в проекте Zasor: Yii 1.1 (Yupe CMS), PHP 7.4. Весь новый код — по PSR-1 и PSR-12.

---

## PSR-1 (базовый стандарт)

- **Теги**: только `<?php` и `<?=`, кодировка UTF-8 без BOM.
- **Файл**: либо объявления (классы, функции, константы), либо side effects (include, output, DB), но не оба.
- **Именование**: классы — PascalCase; константы — UPPER_SNAKE_CASE; методы — camelCase.
- **Namespace**: новые классы — в пространстве имён, совместимом с PSR-4.

---

## PSR-12 (стиль кода)

### Отступы и пробелы

- 4 пробела на уровень отступа, без табов.
- Один statement на строку.

### Фигурные скобки

**Классы** — открывающая `{` на той же строке:

```php
class NewsController extends \yupe\components\controllers\FrontController
{
}
```

**Методы** — открывающая `{` на новой строке:

```php
public function actionView($slug)
{
    // тело
}
```

**Контрольные структуры** — `{` на той же строке:

```php
if ($expr) {
    // тело
} elseif ($other) {
    // тело
} else {
    // тело
}
```

### Прочее

- Длина строки: предпочтительно ≤80, максимум 120.
- В конце PHP-only файла — один перенос строки, без `?>`.
- Ключевые слова и типы в lowercase: `true`, `false`, `null`, `bool`, `int`, `array`.

---

## Специфика Yii 1.1

- **Контроллеры**: наследование от `\yupe\components\controllers\FrontController` или `\yupe\components\controllers\BackendController`.
- **Модели**: `yupe\models\YModel` или `CActiveRecord`; методы `tableName()`, `rules()`, `behaviors()`, `attributeLabels()`, `relations()`.
- **Таблицы**: префикс `yupe_`, шаблон имени `{{module_tablename}}`.
- **Подробнее**: [reference.md](reference.md).

---

## PHP 7.4

Разрешено и предпочтительно:

- Typed properties: `private string $title;`
- Arrow functions: `fn($x) => $x * 2`
- Null coalescing assignment: `$a ??= $b`
- Строгая типизация в сигнатурах методов где уместно

---

## Антипаттерны (избегать)

- Скобка метода на той же строке (Yii-стиль) — использовать PSR-12.
- Табы вместо пробелов.
- `?>` в конце PHP-only файлов.
- Строки длиннее 120 символов без переносов.
- Ключевые слова в верхнем регистре (`True`, `FALSE`).

---

## Учёт старого кода

В существующих файлах возможны: отсутствие namespace, скобка метода на той же строке. **Новый код** — всегда по PSR; при рефакторинге — постепенно приводить к PSR.
