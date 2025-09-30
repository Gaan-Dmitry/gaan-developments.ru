<footer class="footer card shadow-sm px-4 mb-4" itemscope itemtype="https://schema.org/Organization">
  <div class="container py-3 text-center text-md-start">
    <!-- Контакты -->
    <div class="row">
      <div class="col-md-6 mb-2 mb-md-0">
        <p class="mb-1">&copy; <?= date('Y') ?> <span itemprop="name">Дмитрий</span>. Все права защищены.</p>
        <meta itemprop="url" content="https://example.com">
        <div itemprop="contactPoint" itemscope itemtype="https://schema.org/ContactPoint">
          <meta itemprop="contactType" content="customer support">
          <a href="mailto:info@example.com" itemprop="email">info@example.com</a> | <br class="d-b d-md-none">
          <a href="tel:+79990000000" itemprop="telephone">+7 (999) 000-00-00</a>
        </div>
      </div>
      <div class="col-md-6 d-flex align-items-center flex-row-reverse">
        <a href="privacy.php" class="text-muted">Политика конфиденциальности</a>
      </div>
    </div>
  </div>

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