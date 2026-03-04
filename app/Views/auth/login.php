<!doctype html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login - Sistem Administrasi</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.5.0/css/all.min.css">
  <link rel="stylesheet" href="<?= base_url('aset/css/login-wow.css') ?>">
</head>

<body class="login-ultra">

<div class="top-actions">
  <div class="pill" id="toggleTheme" title="Toggle Dark Mode">
    <i class="fa-solid fa-moon"></i>
    <span>Mode</span>
  </div>
</div>

<div class="bg-fx">
  <span></span><span></span><span></span>
</div>

<div class="login-shell">

  <div class="brand-banner">
    <span class="brand-badge"></span>
    <span>Portal Administrasi • Lab UPY • UI/UX Enhanced</span>
  </div>

  <div class="login-card">
    <div class="topline"></div>

    <div class="header">
      <div class="logo-ring">
        <img src="<?= base_url('aset/logo.png') ?>" alt="Logo UPY">
      </div>
      <h1 class="title">SISTEM ADMINISTRASI</h1>
      <div class="subtitle">Pencatatan Transaksi</div>
    </div>

    <div class="body">
      <?php if(session()->getFlashdata('error')): ?>
        <div class="alertx">
          <i class="fa-solid fa-triangle-exclamation mr-1"></i>
          <?= session()->getFlashdata('error') ?>
        </div>
      <?php endif; ?>

      <form id="loginForm" method="post" action="<?= base_url('login') ?>" autocomplete="on">
        <?= csrf_field() ?>

        <!-- USERNAME -->
        <div class="field">
          <div class="label">Username</div>
          <div class="input-wrap">
            <div class="icon-left"><i class="fa-solid fa-user"></i></div>
            <input id="username" class="form-control input-ultra" name="username" placeholder="Masukkan Username" required>
          </div>
        </div>

        <!-- PASSWORD -->
        <div class="field">
          <div class="label">Password</div>
          <div class="input-wrap">
            <div class="icon-left"><i class="fa-solid fa-lock"></i></div>
            <input id="password" type="password" class="form-control input-ultra" name="password" placeholder="Masukkan Password" required>
            <button type="button" class="btn-right" id="togglePass" title="Tampilkan/Sembunyikan Password">
              <i class="fa-solid fa-eye"></i>
            </button>
          </div>

          <!-- Strength meter -->
          <div class="strength" aria-hidden="true">
            <div id="strengthBar"></div>
          </div>
          <div class="strength-text" id="strengthText">Kekuatan password: -</div>
        </div>

        <!-- Helpers -->
        <div class="helper-row">
          <label class="chk">
            <input type="checkbox" id="rememberMe">
            <span>Remember me</span>
          </label>

          <div class="caps" id="capsWarn">
            <i class="fa-solid fa-triangle-exclamation"></i>
            Caps Lock aktif
          </div>
        </div>

        <button id="btnLogin" type="submit" class="btn-login">
          <span id="btnText">Masuk Login</span>
          <span id="btnSpin" class="ml-2" style="display:none;">
            <i class="fa-solid fa-spinner fa-spin"></i>
          </span>
        </button>

        <div class="footer mt-2">Lab - Kwitansi</div>
      </form>
    </div>

    <div class="footer">© <?= date('Y') ?> Lab UPY</div>
  </div>
</div>

<script>
(function(){
  // Theme
  const toggleTheme = document.getElementById('toggleTheme');
  const savedTheme = localStorage.getItem('theme');
  if(savedTheme === 'dark') document.body.classList.add('dark');

  toggleTheme.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    localStorage.setItem('theme', document.body.classList.contains('dark') ? 'dark' : 'light');
  });

  // Remember username
  const remember = document.getElementById('rememberMe');
  const u = document.getElementById('username');
  const savedUser = localStorage.getItem('remember_username');
  if(savedUser){ u.value = savedUser; remember.checked = true; }

  remember.addEventListener('change', () => {
    if(remember.checked) localStorage.setItem('remember_username', u.value || '');
    else localStorage.removeItem('remember_username');
  });
  u.addEventListener('input', () => {
    if(remember.checked) localStorage.setItem('remember_username', u.value || '');
  });

  // Show/Hide password
  const p = document.getElementById('password');
  const togglePass = document.getElementById('togglePass');
  togglePass.addEventListener('click', () => {
    const show = (p.type === 'password');
    p.type = show ? 'text' : 'password';
    togglePass.innerHTML = show
      ? '<i class="fa-solid fa-eye-slash"></i>'
      : '<i class="fa-solid fa-eye"></i>';
  });

  // Caps lock warning
  const capsWarn = document.getElementById('capsWarn');
  p.addEventListener('keyup', (e) => {
    const caps = e.getModifierState && e.getModifierState('CapsLock');
    capsWarn.classList.toggle('show', !!caps);
  });

  // Password strength
  const bar = document.getElementById('strengthBar');
  const txt = document.getElementById('strengthText');

  function scorePass(val){
    let s = 0;
    if(!val) return 0;
    if(val.length >= 8) s += 25;
    if(val.length >= 12) s += 15;
    if(/[A-Z]/.test(val)) s += 15;
    if(/[a-z]/.test(val)) s += 10;
    if(/[0-9]/.test(val)) s += 15;
    if(/[^A-Za-z0-9]/.test(val)) s += 20;
    return Math.min(100, s);
  }

  function setStrength(v){
    bar.style.width = v + '%';
    if(v === 0){
      bar.style.background = 'transparent';
      txt.textContent = 'Kekuatan password: -';
      return;
    }
    if(v < 40){
      bar.style.background = '#dc3545';
      txt.textContent = 'Kekuatan password: Lemah';
    }else if(v < 70){
      bar.style.background = '#f59e0b';
      txt.textContent = 'Kekuatan password: Sedang';
    }else{
      bar.style.background = '#20c997';
      txt.textContent = 'Kekuatan password: Kuat';
    }
  }

  p.addEventListener('input', () => setStrength(scorePass(p.value)));
  setStrength(scorePass(p.value));

  // Loading state
  const form = document.getElementById('loginForm');
  const btn = document.getElementById('btnLogin');
  const btnText = document.getElementById('btnText');
  const btnSpin = document.getElementById('btnSpin');

  form.addEventListener('submit', () => {
    btn.disabled = true;
    btnText.textContent = 'Memproses...';
    btnSpin.style.display = 'inline-block';
  });
})();
</script>

</body>
</html>
