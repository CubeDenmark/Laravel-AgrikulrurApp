// changes radio label to the specific type of file they need to upload
function radioChange(val) {
    const formText = document.getElementById("credentials-label");
    if (val === "farmer") {
        formText.innerText = `Upload Image of RSBSA Stub: `;
    } else {
        formText.innerText = "Upload Valid ID: ";
    }
}
function checkPassword(str) {
    //min 8 letter password, with at least a symbol, upper and lower case letters and a number
    let all = /^(?=.*\d)(?=.*[!@#$%^&*])(?=.*[a-z])(?=.*[A-Z]).{8,}$/;
    let match8chars = /.{8,}$/;
    let matchUpper = /(?=.*[A-Z])/;
    let matchLower = /(?=.*[a-z])/;
    let matchOneNumber = /^(?=.*\d)/;
    let matchSymbol = /(?=.*[!@#$%^&*])/;
    let reminder = document.getElementById("passwordReminder");
    const test8chars = match8chars.test(str);
    const testUpper = matchUpper.test(str);
    const testLower = matchLower.test(str);
    const testOneNumber = matchOneNumber.test(str);
    const testSymbol = matchSymbol.test(str);

    let li8chars = document.getElementById("8chars");
    let liUpperCase = document.getElementById("uppercase");
    let liLowerCase = document.getElementById("lowercase");
    let liOneNumber = document.getElementById("oneNumber");
    let liSymbol = document.getElementById("symbol");

    if (test8chars === true) {
        li8chars.innerHTML = `<li id="8chars"><i class="fa-regular fa-circle-check text-success"></i> Atleast 8 Characters</li>`;
    } else {
        li8chars.innerHTML = `<li id="8chars"><i class="fa-solid fa-xmark"></i> Atleast 8 Characters</li>`;
    }
    if (testUpper === true) {
        liUpperCase.innerHTML = `<li id="8chars"><i class="fa-regular fa-circle-check text-success"></i> Atleast 1 UPPERCASE letter</li>`;
    } else {
        liUpperCase.innerHTML = ` <li id="uppercase"><i class="fa-solid fa-xmark"></i> Atleast 1 UPPERCASE Letter</li>`;
    }
    if (testLower === true) {
        liLowerCase.innerHTML = `<li id="8chars"><i class="fa-regular fa-circle-check text-success"></i> Atleast 1 lowercase letter</li>`;
    } else {
        liLowerCase.innerHTML = `<li id="lowercase"><i class="fa-solid fa-xmark"></i> Atleast 1 lowercase letter</li>`;
    }
    if (testOneNumber === true) {
        liOneNumber.innerHTML = `<li id="8chars"><i class="fa-regular fa-circle-check text-success"></i> Atleast 1 Number</li>`;
    } else {
        liOneNumber.innerHTML = `<li id="oneNumber"><i class="fa-solid fa-xmark"></i> Atleast 1 Number</li>`;
    }
    if (testSymbol === true) {
        liSymbol.innerHTML = `<li id="8chars"><i class="fa-regular fa-circle-check text-success"></i> Atleast 1 symbol ( !, @, #, $, %, ^, &, * )</li>`;
    } else {
        liSymbol.innerHTML = `                                <li id="symbol"><i class="fa-solid fa-xmark"></i> Atleast 1 symbol ( !, @, #, $, %, ^, &, * )</li>`;
    }
    let regexTest = all.test(str);
    if (regexTest === true) {
        reminder.classList.remove("alert-danger");
        reminder.classList.add("alert-success");
    } else {
        reminder.classList.add("alert-danger");
        reminder.classList.remove("alert-success");
    }
}
let myPass = document.getElementById("password");
myPass.addEventListener("focusin", function () {
    let reminder = (document.getElementById("passwordReminder").hidden = false);
});
myPass.addEventListener("focusout", function () {
    let reminder = (document.getElementById("passwordReminder").hidden = true);
});
// checks if password are the same for both the inputs
function passCheck() {
    const pass = document.getElementById("password");
    const conf_pass = document.getElementById("conf-password");
    const btn = document.getElementById("form-submit");
    if (pass.value === conf_pass.value) {
        pass.classList.remove("is-invalid");
        conf_pass.classList.remove("is-invalid");
        pass.classList.add("is-valid");
        conf_pass.classList.add("is-valid");
        //btn.disabled = false;
    } else {
        pass.classList.remove("is-valid");
        conf_pass.classList.remove("is-valid");
        pass.classList.add("is-invalid");
        conf_pass.classList.add("is-invalid");
        //btn.disabled = true;
    }
}

// checks if it is a valid PH phone number
function phoneCheck() {
    const btn = document.getElementById("form-submit");
    const num = document.getElementById("phone-number");
    let start = num.value.slice(0, 2);

    if (num.value.length !== 11 || start !== "09") {
        num.classList.remove("is-valid");
        num.classList.add("is-invalid");
        //btn.disabled = true;
    } else {
        num.classList.remove("is-invalid");
        num.classList.add("is-valid");
        //btn.disabled = false;
    }
}
function legalAgree() {
    const termsBtn = document.getElementById("termsCheck");
    const privacyBtn = document.getElementById("privacyCheck");
    const btn = document.getElementById("form-submit");
    if (termsBtn.checked === true && privacyBtn.checked === true) {
        btn.disabled = false;
    } else {
        btn.disabled = true;
    }
}
