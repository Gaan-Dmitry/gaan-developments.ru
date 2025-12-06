<?php
require 'config.php';
?>
<!doctype html>
<html lang="ru">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">

  <!-- SEO -->
  <title>Часто задаваемые вопросы — Gaan Developments</title>
  <meta name="description" content="Ответы на часто задаваемые вопросы о создании сайтов, ценах, сроках и процессе разработки.">
  <meta name="keywords" content="вопросы и ответы, FAQ, создание сайтов, цены, сроки, веб-разработка, Gaan Developments">
  <meta name="author" content="Дмитрий Гаан">
  <link rel="canonical" href="https://gaan-developments.ru/faq.php">

  <!-- Open Graph -->
  <meta property="og:title" content="Часто задаваемые вопросы — Gaan Developments">
  <meta property="og:description" content="Ответы на часто задаваемые вопросы о создании сайтов, ценах, сроках и процессе разработки.">
  <meta property="og:image" content="https://gaan-developments.ru/uploads/gaan-developments.png">
  <meta property="og:type" content="website">
  <meta property="og:url" content="https://gaan-developments.ru/faq.php">
  <meta property="og:locale" content="ru_RU">
  <meta property="og:site_name" content="Gaan Developments">

  <!-- Twitter Cards -->
  <meta name="twitter:card" content="summary_large_image">
  <meta name="twitter:title" content="Часто задаваемые вопросы — Gaan Developments">
  <meta name="twitter:description" content="Ответы на часто задаваемые вопросы о создании сайтов, цены, сроках и процессе разработки.">
  <meta name="twitter:image" content="https://gaan-developments.ru/uploads/gaan-developments.png">

  <!-- Favicon & CSS -->
  <link rel="icon" href="/uploads/logo-60x56.svg" type="image/svg+xml">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="/assets/css/bootstrap.min.css">
  
  <!-- Bootstrap JS -->
  <script src="/assets/js/bootstrap.bundle.min.js" defer></script>
  
  <!-- Schema.org -->
  <script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "FAQPage",
    "mainEntity": [
      {
        "@type": "Question",
        "name": "Сколько стоит создание сайта?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Стоимость сайта зависит от его типа и сложности. Лендинги от 15 000 ₽, интернет-магазины от 70 000 ₽, корпоративные сайты от 50 000 ₽. Точную стоимость рассчитываем индивидуально после обсуждения задач."
        }
      },
      {
        "@type": "Question",
        "name": "Какие сроки разработки?",
        "acceptedAnswer": {
          "@type": "Answer",
          "text": "Сроки зависят от сложности проекта. Лендинги — 5-10 дней, интернет-магазины — 2-6 недель, корпоративные сайты — 3-8 недель. Сроки фиксируем в договоре."
        }
      }
    ]
  }
  </script>
</head>
<body>
<main class="container" itemscope itemtype="https://schema.org/Person">
  <?php require_once __DIR__ . '/header.php'; ?>

  <!-- Schema.org microdata -->
  <meta itemprop="name" content="Дмитрий Гаан">
  <meta itemprop="brand" content="Gaan Developments">
  <meta itemprop="jobTitle" content="Самозанятый веб-разработчик">
  <meta itemprop="url" content="https://gaan-developments.ru/">
  <meta itemprop="logo" content="https://gaan-developments.ru/uploads/logo-60x56.svg">

  <link itemprop="sameAs" href="https://vk.com/Gaan_Dmitry">
  <link itemprop="sameAs" href="https://t.me/gaan_developments">
  <link itemprop="sameAs" href="https://github.com/Gaan_Dmitry">

  <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
    <meta itemprop="contactType" content="customer support">
    <meta itemprop="email" content="gaandima55@yandex.ru">
    <meta itemprop="url" content="https://t.me/Gaan_Developments_bot">
  </div>

  <section class="card shadow-sm p-4 mb-4">
    <div class="card-body text-center">
      <h1 class="card-title mb-3" itemprop="name">Часто задаваемые вопросы</h1>
      <p class="card-text" itemprop="description">
        Ответы на самые популярные вопросы о создании сайтов, ценах, сроках и процессе работы
      </p>
    </div>
  </section>

  <section class="card shadow-sm p-4 mb-4">
    <div class="accordion" id="faqAccordion">
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingOne">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Сколько стоит создание сайта?
          </button>
        </h2>
        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <p>Стоимость сайта зависит от его типа и сложности:</p>
            <ul>
              <li><strong>Лендинги</strong> — от 15 000 ₽</li>
              <li><strong>Интернет-магазины</strong> — от 70 000 ₽</li>
              <li><strong>Корпоративные сайты</strong> — от 35 000 ₽</li>
              <li><strong>Сложные веб-приложения</strong> — от 100 000 ₽</li>
            </ul>
            <p>Точную стоимость рассчитываем индивидуально после обсуждения ваших задач и требований.</p>
            <p class="mb-0"><strong>Специальные предложения:</strong> При заказе комплексных услуг скидка до 15%. Постоянным клиентам — накопительная система скидок до 25%.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingTwo">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
            Какие сроки разработки сайта?
          </button>
        </h2>
        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <p>Сроки зависят от сложности проекта:</p>
            <ul>
              <li><strong>Лендинги</strong> — 5-10 рабочих дней</li>
              <li><strong>Интернет-магазины</strong> — 2-6 недель</li>
              <li><strong>Корпоративные сайты</strong> — 3-8 недель</li>
              <li><strong>Индивидуальные решения</strong> — по согласованию</li>
            </ul>
            <p>Все сроки фиксируются в договоре. При необходимости можем ускорить выполнение за дополнительную плату.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingThree">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
            Какие этапы включает разработка сайта?
          </button>
        </h2>
        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <p>Процесс разработки включает следующие этапы:</p>
            <ol>
              <li><strong>Анализ и планирование</strong> — обсуждение задач, целей и требований</li>
              <li><strong>Прототипирование</strong> — создание структуры и прототипов страниц</li>
              <li><strong>Дизайн</strong> — разработка визуального оформления</li>
              <li><strong>Верстка и программирование</strong> — создание функционала</li>
              <li><strong>Тестирование</strong> — проверка работоспособности на всех устройствах</li>
              <li><strong>Запуск и обучение</strong> — публикация сайта и обучение управлению</li>
              <li><strong>Поддержка</strong> — техническая поддержка и развитие проекта</li>
            </ol>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFour">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
            Нужен ли мне дизайн или можно использовать шаблон?
          </button>
        </h2>
        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <p>У нас есть как <strong>индивидуальные решения</strong>, так и <strong>шаблоны</strong>:</p>
            <p><strong>Индивидуальный дизайн:</strong></p>
            <ul>
              <li>Уникальный визуальный стиль</li>
              <li>Адаптирован под ваш бренд</li>
              <li>Выделяет вас среди конкурентов</li>
              <li>Стоимость от 15 000 ₽</li>
            </ul>
            <p><strong>Шаблонный дизайн:</strong></p>
            <ul>
              <li>Быстрое создание сайта</li>
              <li>Экономия бюджета</li>
              <li>Профессиональный внешний вид</li>
              <li>Возможность кастомизации</li>
            </ul>
            <p>Рекомендуем индивидуальный дизайн для бизнесов, где важна уникальность и запоминаемость.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingFive">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
            Какие данные мне нужно подготовить для создания сайта?
          </button>
        </h2>
        <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <p>Для эффективной работы над вашим проектом рекомендуется подготовить:</p>
            <ul>
              <li><strong>Текстовое наполнение</strong> — описания услуг, компании, контакты</li>
              <li><strong>Изображения</strong> — фотографии продукции, помещений, команды</li>
              <li><strong>Логотип и фирменные цвета</strong> — элементы корпоративного стиля</li>
              <li><strong>Примеры сайтов</strong> — вдохновение и понимание ваших предпочтений</li>
              <li><strong>Цели и задачи</strong> — зачем вам нужен сайт и чего вы хотите достичь</li>
              <li><strong>Контактную информацию</strong> — email, адрес, соцсети</li>
            </ul>
            <p>Если чего-то нет, я могу помочь с подготовкой контента за дополнительную плату.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSix">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
            Как проходит процесс работы и как я могу отслеживать прогресс?
          </button>
        </h2>
        <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <p>Я использую прозрачный процесс работы:</p>
            <ul>
              <li><strong>Еженедельные отчеты</strong> — о проделанной работе и следующих шагах</li>
              <li><strong>Доступ к промежуточной версии</strong> — вы видите прогресс в реальном времени</li>
              <li><strong>Обратная связь</strong> — регулярные обсуждения и корректировки</li>
              <li><strong>Трекер задач</strong> — вы можете видеть статус выполнения этапов</li>
              <li><strong>Тестирование</strong> — вы участвуете в проверке функционала</li>
            </ul>
            <p>Я использую современные инструменты управления проектами для максимальной прозрачности.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingSeven">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
            Предоставляете ли вы поддержку после сдачи сайта?
          </button>
        </h2>
        <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <p>Да, я предоставляю <strong>постпроектную поддержку</strong>:</p>
            <ul>
              <li><strong>Техническая поддержка</strong> — устранение неполадок, обновления</li>
              <li><strong>Контент-поддержка</strong> — обновление текстов, изображений, цен</li>
              <li><strong>SEO-оптимизация</strong> — улучшение позиций в поисковиках</li>
              <li><strong>Маркетинговая поддержка</strong> — настройка рекламы, аналитики</li>
              <li><strong>Развитие функционала</strong> — добавление новых возможностей</li>
            </ul>
            <p>Я предлагаю гибкие тарифы поддержки — от базовых до комплексных решений.</p>
          </div>
        </div>
      </div>
      <div class="accordion-item">
        <h2 class="accordion-header" id="headingEight">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
            Можно ли внести изменения после запуска сайта?
          </button>
        </h2>
        <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight" data-bs-parent="#faqAccordion">
          <div class="accordion-body">
            <p>Конечно! Я закладываю <strong>гибкость в архитектуре</strong> сайта, чтобы вы могли:</p>
            <ul>
              <li>Добавлять и редактировать страницы</li>
              <li>Обновлять контент и изображения</li>
              <li>Изменять структуру меню</li>
              <li>Добавлять новые разделы и функции</li>
              <li>Интегрировать с CRM и другими системами</li>
            </ul>
            <p>Я также предоставляею обучение по управлению сайтом и готов помочь с любыми изменениями.</p>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section class="card shadow-sm p-4 mb-4 text-center d-flex align-items-center">
    <h2>Остались вопросы?</h2>
    <p>Напишите нам в Telegram-бот — я подробно отвечу на все интересующие вас вопросы и предложу оптимальное решение для вашего бизнеса.</p>
    <a href="https://t.me/Gaan_Developments_bot" class="btn btn-lg btn-primary w-75 text-center" target="_blank" rel="noopener">Задать вопрос в Telegram-боте</a>
    <p class="mt-3 text-muted">Или напишите на email: <a href="mailto:gaandima55@yandex.ru">gaandima55@yandex.ru</a></p>
  </section>

  <?php require_once __DIR__ . '/footer.php'; ?>
</main>
</body>
</html>