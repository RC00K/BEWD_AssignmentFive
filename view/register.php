<?php include 'header.php'; ?>
    <nav>
      <div class="logo">Zippy Auto</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a href=".?action=show_vehicle_list">Home</a></li>
        <?php 
            if(!isset($userid) && ($action != 'register' || $action != 'logout')) {
                if($action == 'logout') {
                    echo '';
                } else {
                    echo '<li><a class="active" href=".?action=register">Register</a></li>';
                }
            } else if(isset($userid) && ($action != 'register' || $action != 'logout')) {
                if($action == 'register' || $action == 'logout') {
                    echo '';
                } else {
                    echo "<li><a class='active' href='.?action=logout'>Sign Out</a></li>";
                }
            }
        ?>
      </ul>
    </nav>
    <?php if($firstname) : ?>
    <div class="center">
        <h1>
            Thank you for registering, <?php echo $firstname; ?>!
        </h1>
    </div>
    <?php else: ?>
        <br>
        <br>
        <br>
        <br>
        <br>
        <div class="row">
            <div class="col-md-12">
        <form action="." method="GET">
            <h1>Register</h1>
            <fieldset>
                <legend><span class="number">1</span>Your Info</legend>
                <label for="name">First Name:</label>
                <input type="hidden" name="action" value="register">
                <input type="text" placeholder="First Name" aria-placeholder="new-todo..." name="firstname" maxlength="30" autofocus required>
            </fieldset>
            <button type="submit" class="submit-btn">Register</button>
        </form>
        </div>
        </div>
    <?php endif ?>
<?php include 'footer.php'; ?>