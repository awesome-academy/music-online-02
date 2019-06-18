//////// xem truoc anh
function  readURL(input,thumbimage) {
    var  reader = new FileReader();
    reader.onload = function (e) 
    {
        $("#thumbimage").attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
    $("#thumbimage").show();
    $(".filename").text($("#uploadfile").val());
    $(".Choicefile").css("background", "#C4C4C4");
    $(".Choicefile").css("cursor", "default");
    $(".removeimg").show();
    $(".Choicefile").unbind("click"); //Xóa sự kiện  click trên nút .Choicefile
}
    $(".Choicefile").bind("click", function () 
    { //Chọn file khi .Choicefile Click
        $("#uploadfile").click();         
    });
    $(".removeimg").click(function () {//Xóa hình  ảnh đang xem
        $("#thumbimage").attr("src", "").hide();
        $("#myfileupload").html("<input type='file' id='uploadfile' onchange='readURL(this);'/>");
        $(".removeimg").hide();
        $(".Choicefile").bind("click", function () 
        {//Tạo lại sự kiện click để chọn file
            $("#uploadfile").click();
        });
        $(".Choicefile").css("background", "#0877D8");
        $(".Choicefile").css("cursor", "pointer");
        $(".filename").text("");
   });
