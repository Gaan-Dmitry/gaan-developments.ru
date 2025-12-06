<?php
// Устанавливаем HTTP статус 404
http_response_code(404);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 — Страница не найдена | Gaan Developments</title>
    
    <!-- SEO -->
    <meta name="description" content="Запрашиваемая страница не найдена. Ошибка 404 - страница не существует.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="https://gaan-developments.ru/404.php">
    
    <!-- Open Graph -->
    <meta property="og:title" content="404 — Страница не найдена">
    <meta property="og:description" content="Запрашиваемая страница не найдена.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://gaan-developments.ru/404.php">
    
    <!-- Favicon -->
    <link rel="icon" href="/uploads/logo-60x56.svg" type="image/svg+xml">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    
    <!-- Кастомные стили -->
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
        }
        
        .error-container {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .error-card {
            background: white;
            border-radius: 16px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            max-width: 550px;
            width: 100%;
            overflow: hidden;
        }
        
        .error-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 30px 20px;
            text-align: center;
        }
        
        .error-code {
            font-size: 72px;
            font-weight: 800;
            margin-bottom: 10px;
            line-height: 1;
        }
        
        .error-title {
            font-size: 24px;
            font-weight: 600;
            margin: 0;
        }
        
        .error-body {
            padding: 40px 30px;
        }
        
        .error-icon {
            font-size: 64px;
            margin-bottom: 20px;
            color: #764ba2;
        }
        
        .error-message {
            font-size: 18px;
            color: #555;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .error-search {
            max-width: 400px;
            margin: 0 auto 25px;
        }
        
        .search-input {
            border-radius: 50px;
            padding: 12px 20px;
            border: 2px solid #e0e0e0;
            transition: all 0.3s;
        }
        
        .search-input:focus {
            border-color: #764ba2;
            box-shadow: 0 0 0 3px rgba(118, 75, 162, 0.2);
        }
        
        .btn-search {
            border-radius: 50px;
            padding: 12px 30px;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            font-weight: 600;
        }
        
        .btn-search:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.4);
        }
        
        .error-links {
            margin: 30px 0;
        }
        
        .error-links h5 {
            color: #555;
            margin-bottom: 15px;
            font-size: 16px;
        }
        
        .link-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
        }
        
        .link-item {
            padding: 10px 15px;
            background: #f8f9fa;
            border-radius: 8px;
            text-decoration: none;
            color: #555;
            transition: all 0.3s;
            display: block;
            text-align: center;
        }
        
        .link-item:hover {
            background: #764ba2;
            color: white;
            transform: translateY(-2px);
            text-decoration: none;
        }
        
        .btn-actions {
            display: flex;
            gap: 10px;
            justify-content: center;
            flex-wrap: wrap;
            margin-top: 30px;
        }
        
        .btn-error {
            min-width: 150px;
            padding: 12px 24px;
            border-radius: 8px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-error:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }
        
        /* Анимации */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .error-card {
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .error-icon {
            animation: float 3s ease-in-out infinite;
        }
        
        /* Адаптивность */
        @media (max-width: 576px) {
            .error-code {
                font-size: 60px;
            }
            
            .error-title {
                font-size: 20px;
            }
            
            .error-body {
                padding: 30px 20px;
            }
            
            .link-grid {
                grid-template-columns: 1fr;
            }
            
            .btn-actions {
                flex-direction: column;
            }
            
            .btn-error {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <div class="error-container">
        <div class="error-card">
            <div class="error-header">
                <div class="error-code">404</div>
                <h1 class="error-title">Страница не найдена</h1>
            </div>
            
            <div class="error-body text-center">
                <div class="error-icon">🔍</div>
                
                <p class="error-message">
                    Запрашиваемая страница не существует или была перемещена.
                </p>
                
                <!-- Поиск по сайту -->
                <div class="error-search">
                    <form action="/search.php" method="get" class="d-flex gap-2">
                        <input type="text" 
                               name="q" 
                               class="form-control search-input" 
                               placeholder="Поиск по сайту...">
                        <button type="submit" class="btn btn-primary btn-search">
                            Найти
                        </button>
                    </form>
                </div>
                
                <!-- Полезные ссылки -->
                <div class="error-links">
                    <h5>Возможно, вы искали:</h5>
                    <div class="link-grid">
                        <a href="/" class="link-item">Главная</a>
                        <a href="/services.php" class="link-item">Услуги</a>
                        <a href="/order.php" class="link-item">Заказать</a>
                        <a href="/review.php" class="link-item">Отзывы</a>
                    </div>
                </div>
                
                <div class="btn-actions">
                    <a href="/" class="btn btn-primary btn-error">
                        На главную
                    </a>
                    <a href="/order.php" class="btn btn-outline-primary btn-error">
                        Заказать сайт
                    </a>
                    <a href="javascript:history.back()" class="btn btn-outline-secondary btn-error">
                        Назад
                    </a>
                </div>
                
                <div class="mt-4 pt-3 border-top">
                    <p class="text-muted small mb-2">
                        Нужна помощь? Свяжитесь со мной:
                    </p>
                    <div class="d-flex flex-wrap gap-2 justify-content-center">
                        <a href="https://t.me/Gaan_Developments_bot" 
                           class="btn btn-sm btn-outline-primary"
                           target="_blank"
                           rel="noopener">
                            Telegram-бот
                        </a>
                        <a href="mailto:gaandima55@yandex.ru" 
                           class="btn btn-sm btn-outline-secondary">
                            Email
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Bootstrap JS -->
    <script src="/assets/js/bootstrap.bundle.min.js"></script>
    
    <script>
        // Дополнительные интерактивные элементы
        document.addEventListener('DOMContentLoaded', function() {
            // Логирование ошибки
            console.log('404 Error: Page Not Found - URL: ' + window.location.href);
            
            // Автоматический редирект на главную через 30 секунд
            setTimeout(function() {
                window.location.href = '/';
            }, 30000);
            
            // Отображение таймера редиректа
            let countdown = 30;
            const timerElement = document.createElement('div');
            timerElement.className = 'text-muted small mt-3';
            timerElement.innerHTML = `Автоматический переход на главную через <span id="countdown">${countdown}</span> секунд`;
            
            document.querySelector('.error-body').appendChild(timerElement);
            
            const countdownElement = document.getElementById('countdown');
            const countdownInterval = setInterval(function() {
                countdown--;
                countdownElement.textContent = countdown;
                
                if (countdown <= 0) {
                    clearInterval(countdownInterval);
                    window.location.href = '/';
                }
            }, 1000);
            
            // Фокус на поле поиска
            const searchInput = document.querySelector('.search-input');
            if (searchInput) {
                setTimeout(() => {
                    searchInput.focus();
                }, 500);
            }
        });
    </script>
</body>
</html>