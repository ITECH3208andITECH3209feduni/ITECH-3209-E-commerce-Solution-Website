<?php
require_once("users.php");
$users = getAllCustomers(); ?>


<div class="d-flex align-items-center">
    <div class="heading">
        <h3>Users</h3>
    </div>
    <hr />
</div>


<table class="table table-striped" id="users_table">
    <thead>
        <tr>
            <th scope="col">UserName</th>
            <th scope="col">Email</th>
            <th scope="col">Phone</th>
            <th scole="col">Address</th>
            <th scope="col">Type</th>
            <th scope="col">Action</th>

        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_array($users)) {
        ?>

        <tr>

            <?php
                echo "<td>" . $row['l_username'] . "</h1>";
                echo "<td>" . $row['email'] . "</h1>";
                echo "<td>" . $row['phone'] . "</h1>";

                echo "<td>" . $row['l_address'] . "</h1>";
                echo "<td>" . $row['User_Type'] . "</h1>";
                echo '<td><button type="button" class="btn" data-toggle="modal" data-target="#mailerModal" data-email='.$row['email'].'><i class="fas fa-lg fa-envelope"></i></button>
            </td>';



            ?>

        </tr>
        <?php } ?>


    </tbody>
</table>
<!-- mailer modal -->
<div class="modal fade" id="mailerModal" tabindex="-1" role="dialog" aria-labelledby="mailerModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="mailer.php" method="post">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">Recipient:</label>
                        <input type="email" name="recipient-email" class="form-control" id="recipient-email" readonly>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Message:</label>
                        <textarea class="form-control" name="message-text" id="message-text"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" name="mailAdmin" class="btn btn-primary">Send message</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#users_table').DataTable();

});
$('#mailerModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var recipient = button.data('email') // Extract info from data-* attributes
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this)
    modal.find('.modal-title').text('New message to ' + recipient)
    modal.find('.modal-body input').val(recipient)
})
</script>