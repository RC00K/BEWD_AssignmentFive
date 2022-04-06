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
        <li><a class="active" href=".?action=edit_makes">Makes</a></li>
        <li><a href=".?action=edit_type">Types</a></li>
        <li><a href=".?action=edit_class">Classes</a></li>
      </ul>
    </nav>
    <header>
        <form action="." method="POST" class="todo-form">
            <input type="hidden" name="action" value="add_make">
            <input type="text" name="make" class="todo-input" aria-label="todo-input" placeholder="Make Name" aria-placeholder="new-todo..." maxlength="30" autofocus required>
            
            <button type="submit" class="submit-btn">Add</button>
        </form>
    </header>

<table>
        <thead>
            <tr>
                <th>Make</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php if($makes) { ?>
            <?php foreach($makes as $make) : ?>
            <tr>
                <td data-title="Make" scope="row"><?= $make['make_name']; ?></td>
                <td data-title="" class="select" scope="row">
                    <form action="." method="POST">
                        <input type="hidden" name="action" value="delete_make">
                        <input type="hidden" name="make_id" value="<?= $make['make_id']; ?>">
                        <input type="submit" class="delete-btn" value="Delete">
                    </form>
                </td>
            </tr>
            <?php endforeach; ?>
            <?php } else { ?>
                <p>No makes exist yet</p>
            <?php } ?>
        </tbody>
    </table>
<?php include 'footer.php'; ?>