<?php
$user_name = $userid;
unset($userid);
$name = session_name();
$expire = strtotime('-1 year');
$params = session_get_cookie_params();
$path = $params['path'];
$domain = $params['domain'];
$secure = $params['secure'];
$httponly = $params['httponly'];
setcookie($name, '', $expire, $path, $domain, $secure, $httponly);
?>

<?php include 'header.php'; ?>
    <nav>
      <div class="logo">Zippy Auto</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a href=".?action=show_vehicle_list">Home</a></li>
      </ul>
    </nav>
    <div class="center">
        <h1>
            Thank you for signing out, <?php echo $user_name; ?>!
        </h1>
    </div>
<?php include 'footer.php'; ?>