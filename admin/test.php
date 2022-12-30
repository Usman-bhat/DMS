<!-- Model for delete student -->
<div class="modal fade" id="del_student">
    <div class="modal-dialog">
        <div class="modal-content bg-danger">
            <div class="modal-header">
                <h4 class="modal-title">Delete Student</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Do you Really Want to delete this student&hellip;</p>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-outline-light" data-dismiss="modal">No</button>

                <a href="delete_student.php?sid=<?php echo $siid ?>" class="btn btn-sm btn-danger">
                    <i class="fas fa-trash"></i> Delete
                </a>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>






href="delete_student.php?sid=<?php echo $row["t_admission_no"]; ?>