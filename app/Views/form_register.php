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
    background: #007BFF;
    color: #fff;
    border: none;
    cursor: pointer;
  }
  .form-container button:hover {
    background: #0056b3;
  }
</style>

<div class="form-container">
  <form method="post" action="/register/submit">
    <input name="first_name" placeholder="First Name" required>
    <input name="last_name" placeholder="Last Name" required>
    <input name="email" type="email" placeholder="Email" required>
    <input name="phone" placeholder="Phone" required>
    <input name="password" type="password" placeholder="Password" required>
    <input type="hidden" name="csrf_token" value="<?= htmlspecialchars($csrf_token) ?>">
    <button type="submit">Register</button>
  </form>
</div>