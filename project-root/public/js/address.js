let saveBtn = document.getElementById('saveAddressBtn')
let editBtn = document.getElementById('editAddressBtn')
let deleteBtn = document.getElementById('deleteAddressBtn')
let addressContainer = document.getElementById('addressContainer')


function showAddress(address) {
    addressContainer.innerHTML = '<h4>' + address + '</h4>'
}


function showAddressInput(value = '') {
    addressContainer.innerHTML = '<input type="text" id="addressInput" placeholder="Unesite adresu" value="' + value + '">'
}


let savedAddress = getCookie('deliveryAddress')
if (savedAddress) {
    showAddress(savedAddress)
    deleteBtn.style.display = 'inline-block'
    editBtn.style.display = 'inline-block'
} else {
    showAddressInput()
}


saveBtn.addEventListener('click', () => {
    let addressInput = document.getElementById('addressInput').value
    if (addressInput) {
        setCookie('deliveryAddress', addressInput, 365)
        showAddress(addressInput)
        deleteBtn.style.display = 'inline-block'
        editBtn.style.display = 'inline-block'
    }
})


editBtn.addEventListener('click', () => {
    let savedAddress = getCookie('deliveryAddress')
    showAddressInput(savedAddress)
})

deleteBtn.addEventListener('click', () => {
    deleteCookie('deliveryAddress')
    deleteBtn.style.display = 'none'
    editBtn.style.display = 'none'
    showAddressInput()
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

function deleteCookie(name) {
    let xhr = new XMLHttpRequest();
    xhr.open("GET", "/erase-cookie/" + name, true);
    xhr.send();
}