<?php
$admin_name = $adminid;
unset($adminid);
$adminname = session_name();
$expire = strtotime('-1 year');
$params = session_get_cookie_params();
$path = $params['path'];
$domain = $params['domain'];
$secure = $params['secure'];
$httponly = $params['httponly'];
setcookie($adminname, '', $expire, $path, $domain, $secure, $httponly);
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
        <li><a href=".?action=add_vehicle">Vehicles</a></li>
        <li><a href=".?action=edit_makes">Makes</a></li>
        <li><a href=".?action=edit_type">Types</a></li>
        <li><a href=".?action=edit_class">Classes</a></li>
      </ul>
    </nav>
    <div class="center">
        <h1>
            Thank you for signing out, <?php echo $admin_name; ?>!
        </h1>
    </div>
<?php include 'footer.php'; ?>