<?php include 'header.php'; ?>
    <nav>
      <div class="logo">Zippy Auto</div>
    </nav>
    <header>
        <div class="box">
        <form action="." method="GET">
                    <input type="hidden" name="action" value="show_vehicle_list">
                    <div class="one">
                    <select name="make_id" class="dropDown_selector text-primary">
                    
                            <option value="">View All Makes</option>
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
                    
                    <div class="two">
                        <select name="type_id" class="dropDown_selector text-primary">
                            <option value="">View All Types</option>
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

                    <div class="three">
                        <select name="class_id" class="dropDown_selector text-primary">
                            <option value="">View All Classes</option>
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

                    <div class="btn-class btn-group btn-group-sm" role="group" aria-label="Basic radio toggle button group">
                            <input type="radio" class="btn-check" name="sort" id="sort_price" value="price" autocomplete="off" checked>
                            <label class="btn btn-outline-secondary" for="sort_price">Sort By Price</label>

                            <input type="radio" class="btn-check" name="sort" id="sort_year" value="year" autocomplete="off">
                            <label class="btn btn-outline-secondary" for="sort_year">Sort By Year</label>  
                            <div class="col-auto">
                                <button type="submit" class="submit-btn">Submit</button>
                            </div> 
                    </div>
                </form>
    </header>

    <table>
        <thead>
            <tr>
                <th>Year</th>
                <th>Make</th>
                <th>Model</th>
                <th>Type</th>
                <th>Class</th>
                <th>Price</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if($vehicles) { ?>
            <?php foreach($vehicles as $vehicle) : ?>
            <tr>
                <td data-title="Year" scope="row"><?= $vehicle['year']; ?></td>
                <td data-title="Make" scope="row"><?= $vehicle['make_name']; ?></td>
                <td data-title="Model" scope="row"><?= $vehicle['model']; ?></td>
                <td data-title="Type" scope="row"><?= $vehicle['type_name']; ?></td>
                <td data-title="Class" scope="row"><?= $vehicle['class_name']; ?></td>
                <td data-title="Price" scope="row">$<?= $vehicle['price']; ?></td>
                <td></td>
            </tr>
            <?php endforeach; ?>
            <?php } else { ?>
                <p>No vehicles exist yet</p>
            <?php } ?>
        </tbody>
    </table>
<?php include 'footer.php'; ?>