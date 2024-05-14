let saveBtn = document.getElementById('saveAddressBtn')
let editBtn = document.getElementById('editAddressBtn')
let addressContainer = document.getElementById('addressContainer')


function showAddress(address) {
    addressContainer.innerHTML = '<h4>' + address + '</h4>'
    editBtn.style.display = 'inline-block'
}


function showAddressInput(value = '') {
    addressContainer.innerHTML = '<input type="text" id="addressInput" placeholder="Unesite adresu" value="' + value + '">'
    saveBtn.style.display = 'inline-block'
}


let savedAddress = getCookie('deliveryAddress')
if (savedAddress) {
    showAddress(savedAddress)
} else {
    showAddressInput()
}


saveBtn.addEventListener('click', () => {
    let addressInput = document.getElementById('addressInput').value
    setCookie('deliveryAddress', addressInput, 365)
    showAddress(addressInput)
})


editBtn.addEventListener('click', () => {
    let savedAddress = getCookie('deliveryAddress')
    showAddressInput(savedAddress)
    editBtn.style.display = 'none'
})


function setCookie(name, value, days) {
    let expires = "";
    if (days) {
        let date = new Date();
        date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
        expires = "; expires=" + date.toUTCString();
    }
    document.cookie = name + "=" + (value || "") + expires + "; path=/";
}


function getCookie(name) {
    let nameEQ = name + "=";
    let ca = document.cookie.split(';');
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i];
        while (c.charAt(0) == ' ') c = c.substring(1, c.length);
        if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length, c.length);
    }
    return null;
}