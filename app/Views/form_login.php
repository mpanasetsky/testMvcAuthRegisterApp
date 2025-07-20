<?php if (!empty($_SESSION['flash_message'])): ?>
  <div style="background:#ffeeba; padding:10px; margin:10px auto; max-width:400px; border:1px solid #f5c6cb; border-radius:5px;">
    <?= htmlspecialchars($_SESSION['flash_message']) ?>
  </div>
  <?php unset($_SESSION['flash_message']); endif; ?>

<style>
  .form-container {
    max-width: 400px;
    margin: 50px auto;
    padding: 20px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    font-family: sans-serif;
  }
  .form-container input, .form-container button {
    width: 100%;
    padding: 10px;
    margin: 10px 0;
    border: 1px solid #aaa;
    border-radius: 5px;
  }
  .form-container button {
    background: #28a745;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  .form-container button:hover {
    background: #1e7e34;
  }
</style>

<div class="form-container">
  <form method="post" action="/login/submit">
    <input name="email" type="email" placeholder="Email" required>
    <input name="password" type="password" placeholder="Password" required>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
    <button type="submit">Login</button>
  </form>
</div>