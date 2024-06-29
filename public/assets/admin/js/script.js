// Status enter service

// const statusEle = document.getElementById("status");
// statusEle.onchange = function () {
//   var value = statusEle.value;
//   statusEle.classList.add("btn");
//   if (value == "1") {
//     statusEle.classList.add("btn-success");
//     statusEle.classList.remove("btn-danger");
//   } else if (value == "0") {
//     statusEle.classList.add("btn-danger");
//     statusEle.classList.remove("btn-success");
//   } else {
//     statusEle.classList.remove("btn-success");
//     statusEle.classList.remove("btn-danger");
//     statusEle.classList.remove("btn");
//   }
// };

// Delete dialog

function showDialog(e, link) {
  let overlay = document.querySelector(".overlay");
  overlay.style.display = "flex";
  Swal.fire({
    title: "Bạn có chắc chắn muốn xóa?",
    text: "Bạn sẽ không thể khôi phục nếu xóa!",
    icon: "warning",
    showCancelButton: true,
    confirmButtonColor: "#3085d6",
    cancelButtonColor: "#d33",
    confirmButtonText: "Có",
    cancelButtonText: "Hủy",
  }).then((result) => {
    if (result.isConfirmed) {
      window.location = link;
    } else {
      overlay.style.display = "none";
    }
  });
  let alert = document.querySelector(".swal2-popup");
  var id = e.getAttribute("id_delete");
  alert.setAttribute("id_delete", id);
}

// Autosize textarea

// function autoResize(textarea) {
//   textarea.style.height = "auto";
//   textarea.style.height = textarea.scrollHeight + "px";
// }

// document.addEventListener("DOMContentLoaded", function () {
//   const textareas = document.querySelectorAll("textarea");
//   textareas.forEach((element) => {
//     autoResize(element);
//   });
// });
