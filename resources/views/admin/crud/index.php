
<a href="/admin/users/create"><button>Create User</button></a>
<br /><br />

<table border="1" style="border-collapse: collapse;" cellpadding="5">
    <thead>
        <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Password</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
        if(!empty($data['results'])) {
            foreach($data['results'] as $result) {

                echo '<tr>';

                $attributes = $result->attributes();

                foreach($attributes as $key => $value) {
                    echo '<td>'.$value.'</td>';
                }

                ?>
                <td>
                    <a href="/admin/users/<?php echo !empty($result->id) ? $result->id : null; ?>/edit"><button>Edit</button></a> |
                    <a href="/admin/users/<?php echo !empty($result->id) ? $result->id : null; ?>/delete"><button>Delete</button></a>
                </td>
                <?php

                echo '</tr>';
            }
        }
    ?>
    </tbody>
</table>
