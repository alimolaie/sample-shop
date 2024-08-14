var account_btn = document.getElementById("account-btn");
var login = document.getElementById("login");
var registr = document.getElementById("registr");

function registr() {
    account_btn.style.left = "110px";
    registr.style.left = "50px";
    login.style.left = "-400px";
}

function login() {
    account_btn.style.left = "0px";
    registr.style.left = "450px";
    login.style.left = "50px";
}