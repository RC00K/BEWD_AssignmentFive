<?php include 'header.php'; ?>
    <nav>
      <div class="logo">Zippy Auto</div>
      <input type="checkbox" id="click">
      <label for="click" class="menu-btn">
        <i class="fas fa-bars"></i>
      </label>
      <ul>
        <li><a href=".?action=show_vehicle_list">Home</a></li>
        <li><a class="active" href=".?action=add_vehicle">Vehicles</a></li>
        <li><a href=".?action=edit_makes">Makes</a></li>
        <li><a href=".?action=edit_type">Types</a></li>
        <li><a href=".?action=edit_class">Classes</a></li>
      </ul>
    </nav>
        <br>
        <br>
        <br>
        <br>
        <br>
        <form action="." method="POST">
            <input type="hidden" name="action" value="show_add_vehicle">
                    <div class="one center-box">
                    <select name="make_id" class="dropDown_selector text-primary">
                    
                            <option value="">Make</option>
                            <?php foreach ($makes as $make) : ?>
                                <?php if($make_id == $make['make_id']) {?>
                                    <option value="<?= $make['make_id']?>" selected>
                            <?php }else { ?>
                                <option value="<?= $make['make_id']?>">
                            <?php } ?>
                                    <?= $make['make_name'] ?>
                                </option>
                            <?php endforeach; ?>
                    </select> 
                    </div>
                    
                    <div class="two center-box">
                        <select name="type_id" class="dropDown_selector text-primary">
                            <option value="">Type</option>
                            <?php foreach ($types as $type) : ?>
                                <?php if($type_id == $type['type_id']) {?>
                                    <option value="<?= $type['type_id']?>" selected>
                            <?php }else { ?>
                                <option value="<?= $type['type_id']?>">
                            <?php } ?>
                                    <?= $type['type_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="three center-box">
                        <select name="class_id" class="dropDown_selector text-primary">
                            <option value="">Class</option>
                            <?php foreach ($classes as $class) : ?>
                                <?php if($class_id == $class['class_id']) {?>
                                    <option value="<?= $class['class_id']?>" selected>
                            <?php }else { ?>
                                <option value="<?= $class['class_id']?>">
                            <?php } ?>
                                    <?= $class['class_name'] ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="center-box">
            <input type="text" class="todo-input" aria-label="todo-input" placeholder="Year" aria-placeholder="new-todo..." name="year" maxlength="30" autofocus required>

            <input type="text" class="todo-input" aria-label="todo-input" placeholder="Model" aria-placeholder="new-todo..." name="model" maxlength="30" autofocus required>

            <input type="text" class="todo-input" aria-label="todo-input" placeholder="Price" aria-placeholder="new-todo..." name="price" maxlength="30" autofocus required>
        </div>
            
            <button type="submit" class="submit-btn">Add Vehicle</button>
        </form>

<?php include 'footer.php'; ?>