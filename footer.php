<footer class="footer card shadow-sm px-4 mb-4" itemscope itemtype="https://schema.org/Organization">
  <div class="container py-3 text-center text-md-start">
    <!-- Контакты -->
    <div class="row">
      <div class="col-md-6 mb-2 mb-md-0">
        <p class="mb-1">&copy; <?= date('Y') ?> <span itemprop="name">Gaan Developments</span>. Все права защищены.</p>
        <meta itemprop="url" content="https://example.com">
        <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
          <meta itemprop="contactType" content="customer support">
          <a href="mailto:gaandima55@yandex.ru" itemprop="email">gaandima55@yandex.ru</a> | <br class="d-b d-md-none">
          <a href="tel:+79043294061" itemprop="telephone">+7 (904) 329-40-61</a>
        </div>
      </div>
      <div class="col-md-6 d-flex align-items-center flex-row-reverse">
        <a href="privacy.php" class="text-muted">Политика конфиденциальности</a>
      </div>
    </div>
  </div>

<!-- Модалка согласия на Cookies -->
<div class="modal fade" id="cookieModal" tabindex="-1" aria-labelledby="cookieModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white">
        <h5 class="modal-title" id="cookieModalLabel">Мы используем cookies</h5>
      </div>
      <div class="modal-body">
        <p>
          На сайте используются cookies для улучшения работы и анализа трафика. 
          Продолжая пользоваться сайтом, вы соглашаетесь с нашей 
          <a href="/privacy.php" target="_blank">Политикой конфиденциальности</a>.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" id="acceptCookies" class="btn btn-primary">Согласен</button>
      </div>
    </div>
  </div>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
  // Проверка, было ли уже согласие
  if (!localStorage.getItem("cookiesAccepted")) {
    let cookieModal = new bootstrap.Modal(document.getElementById("cookieModal"));
    cookieModal.show();
  }

  // При согласии сохраняем отметку
  document.getElementById("acceptCookies").addEventListener("click", function() {
    localStorage.setItem("cookiesAccepted", "true");
    let modal = bootstrap.Modal.getInstance(document.getElementById("cookieModal"));
    modal.hide();
  });
});
</script>


<button id="scrollTopBtn" class="btn btn-primary position-fixed bottom-0 end-0 m-3 rounded-circle" aria-label="Наверх" title="Подняться наверх" style="width:48px;height:48px;display:none;"> ↑ </button>

  <!-- JS для кнопки -->
  <script>
    const scrollTopBtn = document.getElementById("scrollTopBtn");

    window.addEventListener("scroll", () => {
      if (document.documentElement.scrollTop > 200) {
        scrollTopBtn.style.display = "block";
      } else {
        scrollTopBtn.style.display = "none";
      }
    });

    scrollTopBtn.addEventListener("click", () => {
      window.scrollTo({ top: 0, behavior: "smooth" });
    });
  </script>
</footer>