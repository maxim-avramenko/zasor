/**
 * Универсальный генератор alt-тегов для всех страниц сайта
 * Работает автоматически для существующих и новых страниц
 */

class UniversalAltGenerator {
    constructor() {
        this.baseAlt = 'Рекламное агентство полного цикла Галерея стиля - Казань';
        this.init();
    }
    
    init() {
        document.addEventListener('DOMContentLoaded', () => {
            this.processAllImages();
            
            // Обработка динамически добавляемых изображений
            new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    mutation.addedNodes.forEach((node) => {
                        if (node.nodeType === 1) { // Element node
                            if (node.tagName === 'IMG') {
                                this.processImage(node);
                            } else {
                                node.querySelectorAll('img:not([alt])').forEach(img => {
                                    this.processImage(img);
                                });
                            }
                        }
                    });
                });
            }).observe(document.body, {
                childList: true,
                subtree: true
            });
        });
    }
    
    processAllImages() {
        const images = document.querySelectorAll('img:not([alt]), img[alt=""], img[alt="undefined"]');
        images.forEach(img => this.processImage(img));
    }
    
    processImage(img) {
        // Пропускаем уже обработанные
        if (img.hasAttribute('data-alt-processed')) return;
        
        const altText = this.generateAltForImage(img);
        img.setAttribute('alt', altText);
        img.setAttribute('data-alt-processed', 'true');
        
        console.log('Auto alt generated:', altText);
    }
    
    generateAltForImage(img) {
        // 1. Анализ по классам и структуре (универсальный подход)
        const context = this.analyzeImageContext(img);
        
        // 2. Анализ по имени файла
        const fileNameAnalysis = this.analyzeByFileName(img.src);
        
        // 3. Анализ по позиции на странице
        const positionAnalysis = this.analyzeByPosition(img);
        
        // Комбинируем результаты
        return this.combineAltParts(context, fileNameAnalysis, positionAnalysis);
    }
    
    analyzeImageContext(img) {
        const classList = img.className || '';
        const parent = img.closest('*');
        const parentClasses = parent?.className || '';
        
        // Определяем контекст по классам
        const contextRules = [
            { pattern: /logo|header__logo/, alt: 'Логотип рекламного агентства Галерея стиля' },
            { pattern: /services|uslugi/, alt: 'Наши рекламные услуги' },
            { pattern: /clients|klienty/, alt: 'Наши клиенты' },
            { pattern: /advantages|preimushchestva/, alt: 'Преимущества работы с нами' },
            { pattern: /reviews|otzyvy/, alt: 'Отзывы о нашей работе' },
            { pattern: /portfolio/, alt: 'Примеры наших работ' },
            { pattern: /team|komanda/, alt: 'Наша команда специалистов' },
            { pattern: /contact|kontakty/, alt: 'Контактная информация' },
            { pattern: /hero|banner|main-slider/, alt: 'Главный баннер - рекламное агентство' },
            { pattern: /icon|ikonka/, alt: 'Иконка' },
            { pattern: /button|knopka|btn/, alt: 'Кнопка' }
        ];
        
        for (let rule of contextRules) {
            if (rule.pattern.test(classList) || rule.pattern.test(parentClasses)) {
                return rule.alt;
            }
        }
        
        return null;
    }
    
    analyzeByFileName(src) {
        if (!src) return null;
        
        const fileName = src.split('/').pop().split('.').shift().toLowerCase();
        
        const fileRules = [
            { pattern: /logo|logotip/, alt: 'Логотип' },
            { pattern: /client|klient/, alt: 'Клиент' },
            { pattern: /service|usluga/, alt: 'Услуга' },
            { pattern: /advantage|preimushchestvo/, alt: 'Преимущество' },
            { pattern: /review|otzyv/, alt: 'Отзыв' },
            { pattern: /portfolio|rabota/, alt: 'Работа' },
            { pattern: /team|komanda/, alt: 'Команда' },
            { pattern: /hero|banner/, alt: 'Баннер' },
            { pattern: /icon|ikonka/, alt: 'Иконка' },
            { pattern: /product|produkt/, alt: 'Продукт' },
            { pattern: /brand|brend/, alt: 'Бренд' },
            { pattern: /design|dizayn/, alt: 'Дизайн' },
            { pattern: /advert|reklama/, alt: 'Реклама' }
        ];
        
        for (let rule of fileRules) {
            if (rule.pattern.test(fileName)) {
                return rule.alt;
            }
        }
        
        return null;
    }
    
    analyzeByPosition(img) {
        // Анализ по позиции в DOM-дереве
        const rect = img.getBoundingClientRect();
        const isAboveFold = rect.top < window.innerHeight;
        
        // Поиск ближайшего заголовка
        const nearestHeading = img.closest('h1, h2, h3, h4, h5, h6, .title, .heading, .subtitle') ||
                              this.findNearestTextParent(img);
        
        if (nearestHeading) {
            const headingText = nearestHeading.textContent.trim().substring(0, 50);
            return `Изображение для: ${headingText}`;
        }
        
        // Определение по позиции
        if (isAboveFold) {
            return 'Главное изображение страницы';
        }
        
        return null;
    }
    
    findNearestTextParent(img) {
        let parent = img.parentElement;
        for (let i = 0; i < 5; i++) { // Проверяем 5 уровней вверх
            if (parent) {
                const textContent = parent.textContent.trim();
                if (textContent.length > 10 && textContent.length < 200) {
                    return parent;
                }
                parent = parent.parentElement;
            }
        }
        return null;
    }
    
    combineAltParts(context, fileName, position) {
        const parts = [context, fileName, position].filter(Boolean);
        
        if (parts.length > 0) {
            return `${parts.join(' - ')} | ${this.baseAlt}`;
        }
        
        // Запасные варианты на основе типа страницы
        return this.getFallbackAlt();
    }
    
    getFallbackAlt() {
        const path = window.location.pathname;
        const pageName = this.getPageNameFromPath(path);
        
        const pageRules = [
            { pattern: /^\/$/, alt: 'Главная страница рекламного агентства' },
            { pattern: /uslugi|services/, alt: 'Наши рекламные услуги' },
            { pattern: /portfolio/, alt: 'Портфолио наших работ' },
            { pattern: /o-nas|about/, alt: 'О нашем агентстве' },
            { pattern: /kontakty|contact/, alt: 'Контактная информация' },
            { pattern: /blog|news|novosti/, alt: 'Статья нашего блога' },
            { pattern: /usluga|service/, alt: 'Описание услуги' }
        ];
        
        for (let rule of pageRules) {
            if (rule.pattern.test(path)) {
                return `${rule.alt} | ${this.baseAlt}`;
            }
        }
        
        return `Изображение страницы "${pageName}" | ${this.baseAlt}`;
    }
    
    getPageNameFromPath(path) {
        if (path === '/') return 'Главная';
        
        const segments = path.split('/').filter(seg => seg);
        const lastSegment = segments[segments.length - 1];
        
        // Преобразуем slug в читаемое название
        return lastSegment
            .split('-')
            .map(word => word.charAt(0).toUpperCase() + word.slice(1))
            .join(' ');
    }
}

// Автоматическая инициализация
new UniversalAltGenerator();