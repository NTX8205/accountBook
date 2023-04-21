$(function () {
    $(".btn-warning").click(function () {
        let id = $(this).attr("id");
        let status = $(`tr[id="${id}"]`).attr("status");
        
        if (status === "hide") {
            $(`tr[id="${id}"]`).show().attr("status", "");
        }else {
            $(`tr[id="${id}"]`).hide().attr("status", "hide");
        }
    })
})