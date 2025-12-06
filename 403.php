<?php
// Устанавливаем HTTP статус 403
http_response_code(403);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>403 — Доступ запрещен | Gaan Developments</title>
    
    <!-- SEO -->
    <meta name="description" content="Доступ к этой странице ограничен. Ошибка 403 - доступ запрещен.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="canonical" href="https://gaan-developments.ru/403.php">
    
    <!-- Open Graph -->
    <meta property="og:title" content="403 — Доступ запрещен">
    <meta property="og:description" content="Доступ к этой странице ограничен.">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://gaan-developments.ru/403.php">
    
    <!-- Favicon -->
    <link rel="icon" href="/uploads/logo-60x56.svg" type="image/svg+xml">
    
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
    
    <!-- Кастомные стили -->
    <style>
        body {
            min-height: 100vh;
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
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
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
            overflow: hidden;
        }
        
        .error-header {
            background: linear-gradient(135deg, #ff6b6b 0%, #ee5a52 100%);
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
            color: #ee5a52;
        }
        
        .error-message {
            font-size: 18px;
            color: #555;
            margin-bottom: 25px;
            text-align: center;
        }
        
        .error-details {
            background: #f8f9fa;
            border-radius: 10px;
            padding: 15px;
            margin: 25px 0;
            font-size: 14px;
            color: #666;
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
        
        /* Анимация */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .error-card {
            animation: fadeIn 0.6s ease-out;
        }
        
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            10%, 30%, 50%, 70%, 90% { transform: translateX(-5px); }
            20%, 40%, 60%, 80% { transform: translateX(5px); }
        }
        
        .error-icon {
            animation: shake 0.8s ease-in-out;
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
                <div class="error-code">403</div>
                <h1 class="error-title">Доступ запрещен</h1>
            </div>
            
            <div class="error-body text-center">
                <div class="error-icon">🚫</div>
                
                <p class="error-message">
                    У вас нет прав для доступа к этой странице.
                </p>
                
                <div class="error-details">
                    <strong>Возможные причины:</strong>
                    <ul class="text-start mt-2 mb-0">
                        <li>Страница требует авторизации</li>
                        <li>Доступ ограничен администратором</li>
                        <li>Истек срок действия ссылки</li>
                        <li>Неверные учетные данные</li>
                    </ul>
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
                        Если вы считаете, что это ошибка, свяжитесь со мной:
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
            // Логирование ошибки (опционально)
            console.log('403 Error: Access Forbidden - Page: ' + window.location.pathname);
            
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
        });
    </script>
</body>
</html>