<form method="post" action="/admin/users/create">

    <div class="form">

        <div class="form-header">Create User</div>

        <div class="form-container">

            <!-- first_name -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="first_name">First Name</label>
                </div>
                <div class="form-cell">
                    <input type="text" name="first_name" placeholder="First Name">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- last_name -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="last_name">Last Name</label>
                </div>
                <div class="form-cell">
                    <input type="text" name="last_name" placeholder="Last Name">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- email -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="email">Email</label>
                </div>
                <div class="form-cell">
                    <input type="email" name="email" placeholder="Email">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- password -->
            <div class="form-row">
                <div class="form-cell">
                    <label for="password">Password</label>
                </div>
                <div class="form-cell">
                    <input type="password" name="password" placeholder="Password">
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
                    <input type="date" name="date_of_birth">
                </div>
                <div class="form-clear"></div>
            </div>

            <!-- submit -->
            <div class="form-row">
                <div class="form-cell">
                    &nbsp;
                </div>
                <div class="form-cell form-cell-right">
                    <input type="submit" value="Create User">
                </div>
                <div class="form-clear"></div>
            </div>

        </div>

    </div>
</form>