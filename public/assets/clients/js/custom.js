// Event Document

// document.onclick = function() {
//     document.querySelectorAll('.event-detail').style.display = 'none';
//     document.querySelectorAll(".overlay").style.display = 'none';
// }

// Khám phá công viên

const container = document.querySelector(".container-park");
var w = container.offsetWidth;
const parkList = document.querySelector(".park-list");
const hover = document.querySelector(".park");
hover.addEventListener("mouseenter", function () {
  parkList.style.width = w + "px";
  parkList.style.minWidth = w + "px";
});

// Event slider

$(document).ready(function () {
  $(".event-slider").slick({
    slidesToShow: 2,
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    prevArrow:
      "<button type='button' class='slick-prev'><i class='fa-solid fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next'><i class='fa-solid fa-angle-right' aria-hidden='true'></i></i></button>",
  });
});

// show detail event

let eventDetails = document.querySelectorAll(".event-detail");
let overlays = document.querySelectorAll(".overlay");

function showDetail(e) {
  overlays.forEach((element) => {
    if (element.getAttribute("id_slide") == e.getAttribute("id_slide")) {
      element.style.display = "flex";
    }
  });
  eventDetails.forEach((element) => {
    if (element.getAttribute("id_slide") == e.getAttribute("id_slide")) {
      element.style.display = "flex";
    }
  });
  document.querySelector("html").style.overflowY = "hidden";
}

function hideDetail(e) {
  var overlay = e.closest(".overlay");
  var eventDetail = overlay.querySelector(".event-detail");
  eventDetail.style.display = "none";
  overlay.style.display = "none";
  document.querySelector("html").style.overflowY = "scroll";
}

// Album slider

$(document).ready(function () {
  $(".album-slider").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    infinite: true,
    arrows: true,
    prevArrow:
      "<button type='button' class='slick-prev'><i class='fa-solid fa-angle-left' aria-hidden='true'></i></button>",
    nextArrow:
      "<button type='button' class='slick-next'><i class='fa-solid fa-angle-right' aria-hidden='true'></i></i></button>",
  });
});

// Show password

function togglePass(e) {
  e.classList.toggle("bxs-lock");
  e.classList.toggle("bxs-lock-open");
  var input = e.previousElementSibling;
  if (input.type == "password") input.type = "text";
  else input.type = "password";
}

// Show detail introduction

// console.log(detailsIntro[0].getAttribute('id_detail'));
var overlayIntro = document.querySelector(".overlay");
function showIntroDetail(e) {
  let detailsIntro = document.querySelectorAll(".intro_detail");
  var id = e.getAttribute("id_detail");
  overlayIntro.style.display = "block";
  document.querySelector("html").style.overflow = "hidden";
  detailsIntro.forEach((element) => {
    if (element.getAttribute("id_detail") == id) {
      element.style.display = "flex";
    }
  });
}

var btnCloseDetail = document.querySelector(".closeIntro");
function closeIntroDetail() {
  let detailsIntro = document.querySelectorAll(".intro_detail");
  detailsIntro.forEach(element => {
    element.style.display = 'none';
  });
  overlayIntro.style.display = "none";
  document.querySelector("html").style.overflow = "scroll";
};
