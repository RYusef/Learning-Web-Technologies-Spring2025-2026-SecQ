const UNIT_PRICE = 1000;
const qtyInput   = document.getElementById("quantity");
const totalValue = document.getElementById("total-value");
const couponMsg  = document.getElementById("coupon-msg");

let couponAlerted = false;

qtyInput.addEventListener("keydown", (e) => {
  if (["-", "+", "e", "E"].includes(e.key)) e.preventDefault();
});


qtyInput.addEventListener("input", () => {
  const qty   = parseFloat(qtyInput.value) || 0;
  const total = UNIT_PRICE * qty;

  totalValue.textContent = total.toLocaleString();

  if (total > UNIT_PRICE) {
    couponMsg.classList.add("visible");
    if (!couponAlerted) {
      couponAlerted = true;
      setTimeout(() => alert("Congratulations! You are eligible for a Gift Coupon!"), 50);
    }
  } else {
    couponMsg.classList.remove("visible");
    couponAlerted = false;
  }
});

qtyInput.addEventListener("blur", () => {
  if (!qtyInput.value) qtyInput.value = 0;
});
