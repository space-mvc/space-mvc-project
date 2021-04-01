<form method="POST" action="/admin/users/<?php echo !empty($data['result']['id']) ? $data['result']['id'] : null; ?>/update">
    <input type="hidden" name="_method" value="PUT">

    <div class="form">

        <div class="form-header">Update User</div>

        <div class="form-container">

            <!-- ID -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="id">ID</label>
                </div>
                <div class="form-cell">
                    <input type="text" name="id" placeholder="ID" value="<?php echo !empty($data['result']['id']) ? $data['result']['id'] : null; ?>" readonly="readonly" disabled="disabled">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- first_name -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="first_name">First Name</label>
                </div>
                <div class="form-cell">
                    <input type="text" name="first_name" placeholder="First Name" value="<?php echo !empty($data['result']['first_name']) ? $data['result']['first_name'] : null; ?>">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- last_name -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="last_name">Last Name</label>
                </div>
                <div class="form-cell">
                    <input type="text" name="last_name" placeholder="Last Name" value="<?php echo !empty($data['result']['last_name']) ? $data['result']['last_name'] : null; ?>">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- email -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="email">Email</label>
                </div>
                <div class="form-cell">
                    <input type="email" name="email" placeholder="Email" value="<?php echo !empty($data['result']['email']) ? $data['result']['email'] : null; ?>">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- password -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="password">Password</label>
                </div>
                <div class="form-cell">
                    <input type="password" name="password" placeholder="Password" value="<?php echo !empty($data['result']['password']) ? $data['result']['password'] : null; ?>">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- gender -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="gender">Gender</label>
                </div>
                <div class="form-cell">
                    <select name="gender">
                        <option value="female">Male</option>
                        <option value="male">Female</option>
                    </select>
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- date_of_birth -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="date_of_birth">Date of Birth</label>
                </div>
                <div class="form-cell">
                    <input type="date" name="date_of_birth" value="<?php echo !empty($data['result']['date_of_birth']) ? $data['result']['date_of_birth'] : null; ?>">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- submit -->
            <div class="form-row">
                <div class="form-cell">
                    &nbsp;
                </div>
                <div class="form-cell form-cell-right">
                    <input type="submit" value="Update User">
                </div>
                <div class="form-clear"></div>
            </div>

        </div>

    </div>
</form>