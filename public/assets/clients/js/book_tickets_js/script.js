const select = document.querySelector.bind(document);
const selectAll = document.querySelectorAll.bind(document);
const steps = selectAll(".progress-step");
const line = select(".line2");

// load step
steps.forEach((element) => {
  element.classList.add("non-clickable");
});

const activeIndex = [...steps].findIndex((step) =>
  step.classList.contains("active")
);
line.style.width =
  steps[activeIndex].offsetLeft + steps[activeIndex].offsetWidth + "px";

selectAll(".progress-step").forEach((activeStep, idx) => {
  if (idx < activeIndex) {
    activeStep.classList.add("active");
    activeStep.classList.remove("non-clickable");
  }
});

selectAll(".progress-step").forEach((activeStep, idx) => {
  if (idx <= 1) {
    activeStep.addEventListener("click", function () {
      booking = {
        day: day,
        month: month,
        year: year,
        tickets: [],
        totalPrice: 0,
      };
      saveBookingToSession();
    });
  }
});

// document.addEventListener('DOMContentLoaded', function () {
var currentDate = new Date();
var day = String(currentDate.getDate()).padStart(2, "0");
var month = String(currentDate.getMonth() + 1).padStart(2, "0");
var year = currentDate.getFullYear();
$("#datepicker").datepicker({
  inline: true,
  firstDay: 0, // Start with Sunday as first day of the week
  defaultDate: new Date(year, month - 1, day), // Set default date to current date
  minDate: new Date(year, month - 1, day), // Restrict past dates
  beforeShowDay: function (date) {
    // Disable dates before today
    var currentDate = new Date();
    var today = new Date(
      currentDate.getFullYear(),
      currentDate.getMonth(),
      currentDate.getDate()
    );
    var compareDate = new Date(
      date.getFullYear(),
      date.getMonth(),
      date.getDate()
    );

    if (compareDate < today) {
      return [false, "ui-datepicker-unselectable"];
    } else if (compareDate.getTime() === today.getTime()) {
      return [true, "ui-datepicker-current-day"];
    } else {
      return [true, ""];
    }
  },
  dayNamesMin: ["CN", "T2", "T3", "T4", "T5", "T6", "T7"], // Ngày trong tuần bằng tiếng Việt
  monthNames: [
    "Tháng 1",
    "Tháng 2",
    "Tháng 3",
    "Tháng 4",
    "Tháng 5",
    "Tháng 6",
    "Tháng 7",
    "Tháng 8",
    "Tháng 9",
    "Tháng 10",
    "Tháng 11",
    "Tháng 12",
  ], // Tháng bằng tiếng Việt
  monthNamesShort: [
    "Th1",
    "Th2",
    "Th3",
    "Th4",
    "Th5",
    "Th6",
    "Th7",
    "Th8",
    "Th9",
    "Th10",
    "Th11",
    "Th12",
  ], // Tháng ngắn bằng tiếng Việt
});

// Lam viec voi Session
// Cau hinh 1 ticket
/*
    ticket = {
      id: '',
      title: '',
      price: 0,
      quantity: 0,
    }
  */
let booking = {
  day: day,
  month: month,
  year: year,
  tickets: [],
  totalPrice: 0,
};
let user = {
  full_name: "",
  phone_number: "",
  email: "",
  country: "",
  address: "",
  id_Number: "",
};

function saveBookingToSession() {
  let bookingJSON = JSON.stringify(booking);
  // Lưu vào sessionStorage với key là 'booking'
  sessionStorage.setItem("booking", bookingJSON);
  console.log("save", booking);
}

function getBookingFromSession() {
  // Lấy dữ liệu từ sessionStorage với key là 'booking'
  let bookingJSON = sessionStorage.getItem("booking");
  // Nếu có dữ liệu, chuyển đổi từ JSON thành object và gán lại cho booking
  if (bookingJSON) {
    booking = JSON.parse(bookingJSON);
    console.log("get", booking);
    if (!booking.totalPrice) {
      booking.totalPrice = 0;
    }
  }
}

getBookingFromSession();

function saveUserToSession() {
  let userJSON = JSON.stringify(user);
  // Lưu vào sessionStorage với key là 'user'
  sessionStorage.setItem("user", userJSON);
  console.log("save", user);
}

function getUserFromSession() {
  // Lấy dữ liệu từ sessionStorage với key là 'user'
  let userJSON = sessionStorage.getItem("user");
  // Nếu có dữ liệu, chuyển đổi từ JSON thành object và gán lại cho user
  if (userJSON) {
    user = JSON.parse(userJSON);
    console.log("get", user);
  }
}

$("#datepicker").on("change", function () {
  var selectedDate = $("#datepicker").datepicker("getDate");
  var selected_day = selectedDate.getDate();
  var selected_month = selectedDate.getMonth() + 1;
  var selected_year = selectedDate.getFullYear();

  console.log(selectedDate);
  booking.day = selected_day;
  booking.month = selected_month;
  booking.year = selected_year;
});

updateTicketDateCheckout();
let timerElement = document.getElementById("timer");
if (timerElement) {
  let time = timerElement.textContent.split(":");
  let minutes = parseInt(time[0]);
  let seconds = parseInt(time[1]);
  function startCountdown() {
    let countdown = setInterval(function () {
      if (seconds === 0) {
        if (minutes === 0) {
          clearInterval(countdown);
          window.location.href = "Front_page?timeout=true";
        } else {
          minutes--;
          seconds = 59;
        }
      } else {
        seconds--;
      }

      timerElement.textContent = `${minutes}:${
        seconds < 10 ? "0" : ""
      }${seconds}`;
    }, 1000);
  }

  startCountdown();
  function validateFullName() {
    var fullName = document.getElementById("fullName");
    var fullNameError = document.getElementById("fullNameError");
    if (fullName.value.trim() === "") {
      fullName.classList.add("error");
      fullNameError.classList.add("active");
    } else {
      fullName.classList.remove("error");
      fullNameError.classList.remove("active");
    }
  }

  function validatePhone() {
    var phone = document.getElementById("phone");
    var phoneError = document.getElementById("phoneError");
    var phonePattern = /^[0-9]{10}$/;
    if (!phonePattern.test(phone.value)) {
      phone.classList.add("error");
      phoneError.classList.add("active");
    } else {
      phone.classList.remove("error");
      phoneError.classList.remove("active");
    }
  }

  function validateEmail() {
    var email = document.getElementById("email");
    var emailError = document.getElementById("emailError");
    var emailPattern = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!emailPattern.test(email.value)) {
      email.classList.add("error");
      emailError.classList.add("active");
    } else {
      email.classList.remove("error");
      emailError.classList.remove("active");
    }
  }

  document.querySelectorAll("input").forEach((input) => {
    input.addEventListener("blur", () => {
      switch (input.id) {
        case "fullName":
          validateFullName();
          break;
        case "phone":
          validatePhone();
          break;
        case "email":
          validateEmail();
          break;
      }
    });
  });
}

var btnBuyTicket = select("#buy-ticket");
if (btnBuyTicket != null) {
  btnBuyTicket.addEventListener("click", function () {
    saveBookingToSession();
    window.location.href = "Tickets";
  });
}

/* start ticket-list */
var loadDate = function () {
  var formattedDate = booking.day + "-" + booking.month + "-" + booking.year;
  $("#usage-date").val(formattedDate);
};
loadDate();
const modalDatepicker = select(".modal-datepicker");
const btnOpenModalDate = select(".calendar-icon");
if (btnOpenModalDate != null) {
  btnOpenModalDate.addEventListener("click", function () {
    modalDatepicker.classList.add("open");
  });
}

btnSelectDate = select(".btn-select-date");
if (btnSelectDate) {
  btnSelectDate.addEventListener("click", function () {
    saveBookingToSession();
    loadDate();
    modalDatepicker.classList.remove("open");
  });
}

// Điều khiển số lượng vé
const tickets = selectAll(".ticket");
const increaseButtons = selectAll(".increase");
const decreaseButtons = selectAll(".decrease");
const ticketQuantities = selectAll(".ticket-quantity");
const buyTicketSpan = select(".buy-ticket span");

increaseButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    let id = tickets[index].querySelector("#ticketId").innerText;
    let title = tickets[index].querySelector(".content-ticket").innerText;
    let price = tickets[index]
      .querySelector(".ticket-price span")
      .innerText.replace(/[^\d]/g, "");
    price = parseInt(price);

    let quantity = parseInt(ticketQuantities[index].innerText) + 1;

    let existingTicketIndex = booking.tickets.findIndex(
      (ticket) => ticket.id === id
    );

    buyTicketSpan.innerText = parseInt(buyTicketSpan.innerText) + 1;

    // Nếu tìm thấy đối tượng với id = 1, cập nhật thông tin
    if (existingTicketIndex !== -1) {
      booking.tickets[existingTicketIndex].title = title;
      booking.tickets[existingTicketIndex].price = price;
      booking.tickets[existingTicketIndex].quantity = quantity;
    } else {
      // Nếu không tìm thấy, thêm đối tượng mới vào mảng booking.tickets
      booking.tickets.push({
        id: id,
        title: title,
        price: price,
        quantity: quantity,
      });
    }
    booking.totalPrice += price;
    ticketQuantities[index].innerText = quantity;
    // updateTotalTickets()
    // updateQuantityCheckoutTicket();
  });
});

decreaseButtons.forEach((button, index) => {
  button.addEventListener("click", () => {
    let id = tickets[index].querySelector("#ticketId").innerText;
    let title = tickets[index].querySelector(".content-ticket").innerText;
    let price = tickets[index]
      .querySelector(".ticket-price span")
      .innerText.replace(/[^\d]/g, "");
    price = parseInt(price);
    let quantity = parseInt(ticketQuantities[index].innerText) - 1;
    if (quantity < 0) {
      quantity = 0;
    } else {
      buyTicketSpan.innerText = parseInt(buyTicketSpan.innerText) - 1;
    }

    let existingTicketIndex = booking.tickets.findIndex(
      (ticket) => ticket.id === id
    );
    if (existingTicketIndex !== -1) {
      if (quantity == 0) {
        booking.tickets.splice(existingTicketIndex, 1);
      } else {
        booking.tickets[existingTicketIndex].title = title;
        booking.tickets[existingTicketIndex].price = price;
        booking.tickets[existingTicketIndex].quantity = quantity;
      }
    }
    booking.totalPrice -= price;
    if (booking.totalPrice < 0) booking.totalPrice = 0;
    ticketQuantities[index].innerText = quantity;
    // updateTotalTickets()
    // updateQuantityCheckoutTicket();
  });
});

// function updateTotalTickets() {
//   let total = 0
//   ticketQuantities.forEach((quantity) => {
//     total += parseInt(quantity.innerText)
//   })
//   buyTicketSpan.innerText = total
//   // updateQuantityCheckoutTicket()
// }

// hien thi form list ticket
const modalBuyTickets = select(".modal-buy-tickets");
const buyTicket = select(".buy-ticket");
const tableContainer = select(".table-container");
const modalClose = select(".modal-close");
const listTicketBuy = select(".list-ticket");
// const listTicketLine = selectAll

buyTicket.addEventListener("click", function () {
  modalBuyTickets.classList.add("show");
  listTicketBuy.innerHTML = "";
  let listTextTicket = "";
  booking.tickets.forEach((ticket) => {
    console.log(ticket);
    listTextTicket += `
      <div class="line-ticket">
        <span id="ticketId" style="display: none;">${ticket.id}</span>
        <div class="tickets-info">${ticket.title}</div>
        <div class="date-tickets">${booking.day}/${booking.month}/${
      booking.year
    }</div>
        <div class="quantity-tickets">
          <button class="decrease" data-price="320000"><i class="fa-solid fa-minus"></i></button>
          <span class="ticket-quantity">${ticket.quantity}</span>
          <button class="increase" data-price="320000"><i class="fa-solid fa-plus"></i></button>
        </div>
        <div class="total-price">${ticket.quantity * ticket.price}</div>
        <div class="delete-ticket"><i class="fa-solid fa-trash"></i></div>
      </div>
      <div class="line-list-tickets"></div>
    `;
  });

  listTicketBuy.innerHTML = listTextTicket;
  listTicketBuy.innerHTML += `<div class="line-ticket" style="display: flex;justify-content: space-between; ">
    <span>TỔNG TIỀN</span><spand style="color: red">${booking.totalPrice}</spand>
  </div>`;
});

if (modalClose) {
  modalClose.addEventListener("click", function () {
    modalBuyTickets.classList.remove("show");
  });
}

const btnBuyTicketConfirm = select("#confirm-button");
if (btnBuyTicketConfirm) {
  btnBuyTicketConfirm.addEventListener("click", function () {
    if (booking.tickets.length == 0) {
      alert("Vui lòng chọn vẽ trước khi xác nhận");
    } else {
      saveBookingToSession();
      window.location.href = "Checkout";
    }
  });
}
if (tableContainer) {
  tableContainer.addEventListener("click", function (event) {
    event.stopPropagation();
    // ngan hanh vi noi bot
  });
}

/* end ticket-list */

// })

function updateTicketDateCheckout() {
  const ticketDateCheckout = select("#ticket-date_checkout");
  if (ticketDateCheckout) {
    ticketDateCheckout.innerText = `${booking.day}/${booking.month}/${booking.year}`;
  }
}

const listOderItem = select(".list-order-item");
const orderDateElement = select("#order-date");
const subtotalElement = select("#subtotal");
const totalPriceElement = select("#total-price");

if (listOderItem && orderDateElement && subtotalElement && totalPriceElement) {
  orderDateElement.textContent = `${booking.day}/${booking.month}/${booking.year}`;

  // Clear previous items
  listOderItem.innerHTML = "";

  // Update order items
  booking.tickets.forEach((ticket) => {
    const itemHTML = `
      <div class="order-item-line">
        <div class="line2_checkout"></div>
        <div class="order-item">
            <div class="item-description">
                <p>${ticket.title}</p>
            </div>
            <div class="item-price">
                <p>${ticket.price.toLocaleString("vi-VN")} VND</p>
                <p>x${ticket.quantity}</p>
            </div>
        </div>
      </div>
    `;
    listOderItem.innerHTML += itemHTML;
  });

  // Calculate subtotal
  let subtotal = booking.totalPrice;
  subtotalElement.textContent = `${subtotal.toLocaleString("vi-VN")} VND`;

  // Display total price (no discount and tax included in this example)
  totalPriceElement.textContent = `${subtotal.toLocaleString("vi-VN")} VND`;

  // Call updateOrderDetails to initially populate the order details
}

function updateTicketDateComplete() {
  const ticketDateCheckout = select("#ticket-date_complete");
  if (ticketDateCheckout) {
    ticketDateCheckout.innerText = `${booking.day}/${booking.month}/${booking.year}`;
  }
}

updateTicketDateComplete();

getUserFromSession();

// const regisForm = select('#registrationForm')
// if (regisForm) {
//   regisForm.addEventListener('submit', function (event) {
//     event.preventDefault()

//     console.log(data)
//     // Gửi dữ liệu lên server bằng phương thức POST
//     fetch('End', {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/json',
//       },
//       body: JSON.stringify(data),
//     })
//       .then((response) => response.json())
//       .then((data) => {
//         console.log('Success:', data)
//       })
//       .catch((error) => {
//         console.error('Error:', error)
//       })
//   })
// }

// const btnRegisForm = select("#confirm-btn-checkout");
// if (btnRegisForm) {
//   btnRegisForm.addEventListener("click", function () {
//     user.full_name = select("#fullName").value;
//     user.phone_number = select("#phone").value;
//     user.email = select("#email").value;
//     user.country = select("#country").value;
//     user.address = select("#address").value;
//     user.id_Number = select("#idNumber").value;
//     saveUserToSession();

//     const data = {
//       booking: booking,
//       user: user,
//       booking_date: `${day}/${month}/${year}`,
//       date_of_use: `${booking.day}/${booking.month}/${booking.year}`,
//     };

//     console.log(data);
//     $.ajax({
//       url: "core/Connection.php",
//       type: "POST",
//       data: JSON.stringify(data),
//       contentType: "application/json",
//       success: function (response) {
//         console.log(response);
//       },
//       error: function (xhr, status, error) {
//         console.error(xhr.responseText);
//       },
//     });
//     // window.location.href = 'End'
//   });
// }


const btnRegisForm = select('#confirm-btn-checkout')
if (btnRegisForm) {
  btnRegisForm.addEventListener('click', function () {
    user.full_name = select('#fullName').value;
    user.phone_number = select('#phone').value;
    user.email = select('#email').value;
    user.country = select('#country').value;
    user.address = select('#address').value;
    user.id_Number = select('#idNumber').value;
    saveUserToSession()

    const data = {
      booking: booking,
      user: user,
      booking_date: `${day}/${month}/${year}`,
      date_of_use: `${booking.day}/${booking.month}/${booking.year}`,
    }

    console.log(data);
    $.ajax({
      url: 'core/Connection.php',
      type: 'POST',
      data: JSON.stringify(data),
      contentType: 'application/json',
      success: function (response) {
        console.log(response);
        const jsonResponse = JSON.parse(response);
        if (jsonResponse.status === 'success') {
          console.log('AJAX request succeeded, redirecting now...');
        } else {
          console.error('AJAX request failed:', jsonResponse.message)
        }
      },
      error: function (xhr, status, error) {
        console.error(xhr.responseText);
      },
    })
    window.location.href = 'http://localhost/MVCNew/clients/End';
  })
}

const tableBody = select(".table tbody");
const paymentDateElement = document.querySelector(".payment-date");
const fullNameElement = document.getElementById("customer-fullname");
const phoneNumberElement = document.getElementById("customer-phone");
const addressElement = document.getElementById("customer-address");
const emailElement = document.getElementById("customer-email");

if (
  tableBody &&
  paymentDateElement &&
  fullNameElement &&
  phoneNumberElement &&
  addressElement &&
  emailElement
) {
  tableBody.innerHTML = "";
  booking.tickets.forEach((ticket) => {
    const ticketRow = `
        <tr>
          <td>${ticket.title}</td>
          <td>${booking.day}/${booking.month}/${booking.year}</td>
          <td>${ticket.quantity}</td>
          <td>${ticket.price.toLocaleString("vi-VN")} VND</td>
          <td>${(ticket.price * ticket.quantity).toLocaleString(
            "vi-VN"
          )} VND</td>
        </tr>
      `;
    tableBody.innerHTML += ticketRow;
  });

  const rowTotalAndDiscount = `
    <tr>
      <td colspan="4" class="discount">GIẢM GIÁ</td>
      <td>0 VND</td>
    </tr>
    <tr>
      <td colspan="4" class="total">TỔNG TIỀN</td>
      <td>${booking.totalPrice.toLocaleString("vi-VN")} VND</td>
    </tr>
  `;

  tableBody.innerHTML += rowTotalAndDiscount;

  paymentDateElement.textContent = `${day}/${month}/${year}`;

  fullNameElement.textContent = `${user.full_name}`;
  phoneNumberElement.textContent = `${user.phone_number}`;
  addressElement.textContent = `${user.address}`;
  emailElement.textContent = `${user.email}`;
}
