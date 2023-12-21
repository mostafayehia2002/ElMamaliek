// نسخ ال account number
function copyCodenamee() {
    var accountNumber = document.getElementById('accountNumber');

    var textArea = document.createElement('textarea');
    textArea.value = accountNumber.innerText;

    document.body.appendChild(textArea);

    textArea.select();
    document.execCommand('copy');

    document.body.removeChild(textArea);

}

function copyCodename() {
    var accountNumber = document.getElementById('accountOwner');

    var textArea = document.createElement('textarea');
    textArea.value = accountNumber.innerText;

    document.body.appendChild(textArea);

    textArea.select();
    document.execCommand('copy');

    document.body.removeChild(textArea);

}

function copyCodeaccountNumberr() {
    var accountNumber = document.getElementById('iban');

    var textArea = document.createElement('textarea');
    textArea.value = accountNumber.innerText;

    document.body.appendChild(textArea);

    textArea.select();
    document.execCommand('copy');

    document.body.removeChild(textArea);

}
// border boxes
function toggleBorder(button) {
    var buttons = document.querySelectorAll('.button-bank');
    
    buttons.forEach(function (btn) {
        btn.classList.remove('active');
    });
    button.classList.add('active');
}
// تحديث معلومات المستخدم عند اختيار obtion من ال select
function updateAccountInfo(selectElement) {
    var accountOwner = document.getElementById('accountOwner');
    var accountNumber = document.getElementById('accountNumber');
    var iban = document.getElementById('iban');

    if (selectElement.value === "1") {
        // تحديث المعلومات للحساب الثاني
        accountOwner.textContent = " عز الدين احمد مهدي";
        accountNumber.textContent = "43852711000108";
        iban.textContent = "SA1010000043852711000108";
    } else if (selectElement.value === "2") {
        // تحديث المعلومات للحساب الثالث
        accountOwner.textContent = " مجدي محمود";
        accountNumber.textContent = "68202791284000";
        iban.textContent = "SA8305000068202791284000";
    } else {
        // تحديث المعلومات للحساب الأول (الافتراضي)
        accountOwner.textContent = " حسونه قيمر";
        accountNumber.textContent = "130608010834904";
        iban.textContent = "SA7780000130608010834904";
    }
}

function copyCode() {
    console.log('تم نسخ النص');
}
// upload صورة الايصال
document.getElementById('formFileMultiple').addEventListener('change', function () {
    var fileName = this.value.split('\\').pop();
    document.getElementById('customFileLabel').innerHTML = fileName ? fileName : 'ارفع الصورة من فضلك';
});