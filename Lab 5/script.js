let num1 = "";
let num2 = "";
let symbol = "";
let screen = document.getElementById("screen");

function press(number) {
    if (symbol === "") {
        num1 = num1 + number;
        screen.value = num1;
    } else {
        num2 = num2 + number;
        screen.value = num1 + symbol + num2;
    }
}

function setOperator(op) {
    if (num1 !== "") {
        symbol = op;
        screen.value = num1 + symbol;
    }
}

function solve() {
    let a = parseFloat(num1);
    let b = parseFloat(num2);
    let result = 0;

    if (symbol === "+") result = a + b;
    if (symbol === "-") result = a - b;
    if (symbol === "*") result = a * b;
    if (symbol === "/") result = a / b;

    screen.value = result;
    
    num1 = result.toString();
    num2 = "";
    symbol = "";
}

function clearScreen() {
    num1 = "";
    num2 = "";
    symbol = "";
    screen.value = "";
}

// 5. Delete last character
function del() {
    if (symbol === "") {
        num1 = num1.slice(0, -1);
        screen.value = num1 || "0";
    } else if (num2 === "") {
        symbol = "";
        screen.value = num1;
    } else {
        num2 = num2.slice(0, -1);
        screen.value = num1 + symbol + num2;
    }
}