/**
 * Автоматический генератор alt-тегов для всех страниц сайта
 * Универсальное решение для GS-KZN.RU
 */

(function() {
    'use strict';
    
    // Конфигурация для вашего сайта
    const CONFIG = {
        baseAlt: 'Рекламное агентство полного цикла Галерея стиля - Казань',
        enableLogging: true, // Включить логи для отладки
        processExisting: true,
        processDynamic: true,
        maxRetries: 3
    };
    
    class AutoAltGenerator {
        constructor() {
            this.processedImages = new Set();
            this.retryCount = 0;
            this.init();
        }
        
        init() {
            if (CONFIG.processExisting) {
                if (document.readyState === 'loading') {
                    document.addEventListener('DOMContentLoaded', () => this.processAllImages());
                } else {
                    setTimeout(() => this.processAllImages(), 100);
                }
            }
            
            if (CONFIG.processDynamic) {
                setTimeout(() => this.setupMutationObserver(), 500);
            }
        }
        
        processAllImages() {
            const images = this.findImagesWithoutAlt();
            
            if (CONFIG.enableLogging) {
                console.log(`🔍 AutoAlt: Найдено ${images.length} изображений без alt`);
            }
            
            images.forEach(img => this.processImage(img));
            
            // Повторная проверка для ленивой загрузки
            if (this.retryCount < CONFIG.maxRetries) {
                setTimeout(() => {
                    this.retryCount++;
                    this.processAllImages();
                }, 1500);
            }
        }
        
        findImagesWithoutAlt() {
            return Array.from(document.querySelectorAll('img')).filter(img => {
                const alt = img.getAttribute('alt');
                return !alt || 
                       alt === '' || 
                       alt === 'undefined' ||
                       alt === 'Рекламное агентство - Галерея стиля' ||
                       alt === 'undefined undefined';
            });
        }
        
        processImage(img) {
            if (!img.src) return;
            
            const imgKey = img.src + (img.className || '');
            if (this.processedImages.has(imgKey)) return;
            
            const altText = this.generateAltForImage(img);
            
            if (altText && altText !== img.getAttribute('alt')) {
                img.setAttribute('alt', altText);
                img.setAttribute('data-auto-alt', 'true');
                this.processedImages.add(imgKey);
                
                if (CONFIG.enableLogging) {
                    console.log('✅ AutoAlt:', altText, img.src);
                }
            }
        }
        
        generateAltForImage(img) {
            const src = (img.src || '').toLowerCase();
            const className = (img.className || '').toLowerCase();
            const parent = img.closest('*');
            const parentClass = (parent?.className || '').toLowerCase();
            
            // Специфичные правила для вашего сайта
            const rules = [
                // === ЛОГОТИПЫ ===
                { test: () => src.includes('logo') || className.includes('logo'), 
                  alt: 'Логотип рекламного агентства Галерея стиля' },
                
                // === КЛИЕНТЫ ===
                { test: () => src.includes('client') || className.includes('client'), 
                  alt: 'Наши клиенты - рекламное агентство Галерея стиля' },
                
                { test: () => parentClass.includes('client'), 
                  alt: 'Клиенты рекламного агентства Галерея стиля' },
                
                // === УСЛУГИ ===
                { test: () => src.includes('service') || className.includes('service'), 
                  alt: 'Наши рекламные услуги - Галерея стиля' },
                
                { test: () => parentClass.includes('services-block'), 
                  alt: 'Услуги рекламного агентства Галерея стиля' },
                
                // === ПРЕИМУЩЕСТВА ===
                { test: () => src.includes('advantage') || className.includes('advantage'), 
                  alt: 'Преимущества работы с нами - Галерея стиля' },
                
                { test: () => parentClass.includes('advantages'), 
                  alt: 'Преимущества рекламного агентства Галерея стиля' },
                
                // === ОТЗЫВЫ ===
                { test: () => src.includes('review') || className.includes('review'), 
                  alt: 'Отзывы о нашей работе - Галерея стиля' },
                
                { test: () => parentClass.includes('reviews'), 
                  alt: 'Отзывы клиентов - Галерея стиля' },
                
                // === ЗВЕЗДЫ РЕЙТИНГА ===
                { test: () => src.includes('star'), 
                  alt: 'Рейтинг - Галерея стиля' },
                
                // === ИКОНКИ ===
                { test: () => className.includes('icon-'), 
                  alt: 'Иконка - Галерея стиля' },
                
                // === СОЦСЕТИ ===
                { test: () => parentClass.includes('socials'), 
                  alt: 'Социальная сеть - Галерея стиля' },
                
                // === HEADER ===
                { test: () => className.includes('header__logo'), 
                  alt: 'Логотип в шапке сайта - Галерея стиля' },
                
                // === FOOTER ===  
                { test: () => className.includes('footer__logo'), 
                  alt: 'Логотип в подвале сайта - Галерея стиля' },
                
                // === PDF ===
                { test: () => src.includes('pdf'), 
                  alt: 'PDF презентация - Галерея стиля' },
                
                // === ИЗОБРАЖЕНИЯ УСЛУГ ===
                { test: () => parentClass.includes('services-block__img'), 
                  alt: 'Изображение услуги - рекламное агентство Галерея стиля' },
                
                // === ИЗОБРАЖЕНИЯ ПРЕИМУЩЕСТВ ===
                { test: () => parentClass.includes('advantages__img'), 
                  alt: 'Преимущество работы с нами - Галерея стиля' },
                
                // === СТАТЬИ ===
                { test: () => parentClass.includes('article__img'), 
                  alt: 'Иллюстрация к статье - Галерея стиля' },
                
                // === ОБЩИЕ ИЗОБРАЖЕНИЯ С КОНТЕКСТОМ ===
                { test: () => this.hasNearbyText(img), 
                  alt: () => this.getAltFromContext(img) }
            ];
            
            for (let rule of rules) {
                if (rule.test()) {
                    return typeof rule.alt === 'function' ? rule.alt() : rule.alt;
                }
            }
            
            return this.getFallbackAlt();
        }
        
        hasNearbyText(img) {
            // Проверяем наличие текста рядом с изображением
            const parent = img.parentElement;
            if (parent) {
                const text = parent.textContent.replace(/\s+/g, ' ').trim();
                return text.length > 20 && text.length < 200;
            }
            return false;
        }
        
        getAltFromContext(img) {
            const parent = img.parentElement;
            if (parent) {
                const text = parent.textContent.replace(/\s+/g, ' ').trim();
                const cleanText = text.substring(0, 50).replace(/[^\w\sа-яА-Я]/g, '');
                return `${cleanText}... | ${CONFIG.baseAlt}`;
            }
            return CONFIG.baseAlt;
        }
        
        getFallbackAlt() {
            const path = window.location.pathname;
            
            const pageRules = [
                { pattern: /^\/$/, alt: 'Главная страница рекламного агентства' },
                { pattern: /uslugi|services/, alt: 'Страница услуг' },
                { pattern: /portfolio/, alt: 'Портфолио работ' },
                { pattern: /o-nas|about/, alt: 'О компании' },
                { pattern: /kontakty|contact/, alt: 'Контакты' },
                { pattern: /blog|news|novosti/, alt: 'Блог и новости' },
                { pattern: /usluga|service/, alt: 'Описание услуги' }
            ];
            
            for (let rule of pageRules) {
                if (rule.pattern.test(path)) {
                    return `${rule.alt} | ${CONFIG.baseAlt}`;
                }
            }
            
            return CONFIG.baseAlt;
        }
        
        setupMutationObserver() {
            try {
                const observer = new MutationObserver((mutations) => {
                    mutations.forEach((mutation) => {
                        mutation.addedNodes.forEach((node) => {
                            if (node.nodeType === 1) {
                                if (node.tagName === 'IMG') {
                                    this.processImage(node);
                                } else if (node.querySelectorAll) {
                                    const images = node.querySelectorAll('img');
                                    images.forEach(img => this.processImage(img));
                                }
                            }
                        });
                    });
                });
                
                observer.observe(document.body, {
                    childList: true,
                    subtree: true
                });
            } catch (e) {
                console.warn('AutoAlt: MutationObserver не поддерживается');
            }
        }
    }
    
    // Инициализация
    if (typeof window !== 'undefined') {
        // Ждем полной загрузки страницы
        if (document.readyState === 'loading') {
            document.addEventListener('DOMContentLoaded', () => {
                window.autoAltGenerator = new AutoAltGenerator();
            });
        } else {
            window.autoAltGenerator = new AutoAltGenerator();
        }
    }
    
})();

// Функция для ручной проверки
window.checkAutoAltStatus = function() {
    const processed = document.querySelectorAll('img[data-auto-alt="true"]').length;
    const withoutAlt = document.querySelectorAll('img:not([alt]), img[alt=""], img[alt="undefined"]').length;
    const total = document.querySelectorAll('img').length;
    
    console.log(`📊 AutoAlt Статистика:
    ✅ Обработано: ${processed}
    ❌ Без alt: ${withoutAlt} 
    📋 Всего: ${total}
    🎯 Эффективность: ${Math.round((processed / total) * 100)}%`);
    
    return { processed, withoutAlt, total };
};