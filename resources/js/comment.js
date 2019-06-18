//comment
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
$(document).ready(function(){
    $("#submit_comment").click(function(){
        
        content = $("#content_comment").val();
        musicId = $("#music_comment").val();
        userId = $("#user_comment").val();
        
        if (userId == '') {
            $("#content_comment").val('');
            document.getElementById("noti").innerHTML = "Please login";
        } else {
            $.ajax({
                url: '/comment/add',
                type: 'POST',
                data: "content=" + content + "&userId=" + userId + "&musicId=" + musicId,
                success: function(res){
                    $template =
                    `
                    <article id="comment-id-`+ res.commentId +`" class="comment-item">
                        <a class="pull-left thumb-sm"> 
                            <img src="` + res.image + `" class="img-circle"> 
                        </a> 
                        <section class="comment-body m-b">
                            <header> 
                                <a href="#"><strong>` + res.name + `</strong></a> 
                                <span class="text-muted text-xs block m-t-xs">just now</span> 
                            </header>
                            <div class="row">
                                <div class="col-md-10 m-t-sm" id="label-content-` + res.commentId + `">` + res.content + `</div>
                                <div class="col-md-1"><a class="edit_comment" data-id ="` + res.commentId + `" data-content ="` + res.content + `" href="javascript:;">Edit</a></div>
                                <div class="col-md-1"><a class="delete_comment" data-id="` + res.commentId + `" href="javascript:;">Delete</a></div>
                            </div>
                            <div>
                                <form action="" class="frm_edit_comment" id="edit-comment-id-` + res.commentId + `">
                                    <div class="row">
                                        <textarea class="form-control" name="" id="textarea-edit-` + res.commentId + `" rows="2"></textarea>
                                    </div>
                                    <div class="row">
                                        <button type="submit" class="btn btn-success"><a class="submit-edit" id="btn-edit-` + res.commentId + `" href="javascript:;">Edit</a></button>
                                        <button type="submit" class="btn btn-success"><a class="cancel-edit" href="javascript:;">Cancel</a></button>
                                    </div>
                                </form>
                            </div>
                        </section>
                    </article>
                    `
                    $("#line-comment").prepend($template);
                    $("#content_comment").val('');
                }
            })
        }
        
        return false;
    });
});

//delete comment
$('body').on('click', '.delete_comment', function() {
    
    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
            cancelButton: 'btn btn-danger'
        },
        buttonsStyling: false,
    })
      
    swalWithBootstrapButtons.fire({
        title: 'Are you sure?',
        text: "You want to delete this comment?",
        type: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Yes, delete it!',
        cancelButtonText: 'No, cancel!',
        reverseButtons: true
    }).then((result) => {
        if (result.value) {
            let commentID = $(this).data("id");
            deleteComment(commentID);

            swalWithBootstrapButtons.fire(
                'Deleted!',
                'Your comment has been deleted.',
                'success'
            )
        } else if (result.dismiss === Swal.DismissReason.cancel) {
            swalWithBootstrapButtons.fire(
                'Cancelled',
                'Your imaginary file is safe :)',
                'error'
            )
        }
    })
});

function deleteComment(commentID){
    idDelete = 'comment-id-' + commentID;
    $.ajax({
        type: 'GET',
        url: '/comment/delete/' + commentID,
        data: {
            _token: $('meta[name="csrf-token"]').attr('content')
        },
        success: function() {
            $('#' + idDelete).remove();
        }
    });
}

//edit comment
$('body').on('click', '.edit_comment', function(e) { 
    e.preventDefault;
    let commentID = $(this).data("id");
    let commentContent = $(this).data("content");
    let idEdit = 'edit-comment-id-' + commentID;
    var textareaEdit = 'textarea-edit-' + commentID;
    $('#' + idEdit).css({"display": "block"});
    $('#' + textareaEdit).val(commentContent);
    let idBtnEdit = '#btn-edit-' + commentID;

    $('body').on('click', idBtnEdit, function(e) {
        e.preventDefault;
        editContent = $('#' + textareaEdit).val();
        let labelContent = 'label-content-' + commentID;
        
        $.ajax({
            type: 'POST',
            url: '/comment/edit',
            data: "editContent=" + editContent + "&commentID=" + commentID,
            success: function(res) {   
                
                $('#' + textareaEdit).val(res.newContent);
                $('#' + labelContent).html(res.newContent);
                //$('#' + labelContent).val(res.newContent);
                $('#' + idEdit).css({"display": "none"});
            }
        });
    });
});
