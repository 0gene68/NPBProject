document.getElementById("delete_post").addEventListener("click", function () {
    if (confirm("정말로 게시글을 삭제하시겠습니까?")) {
        document.getElementById("delete_form").submit();
    }
});
