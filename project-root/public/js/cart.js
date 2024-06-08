import { getCookie } from './cookie.js' 

(() => { 

let cart = loadCart()
let codes = {}
let voucherStatus = false

viewCart()

function addToCart(title, price, image_url) {
    if (!cart[title]) {
        cart[title] = {amount: 1, price: price, image_url: image_url}
    }

    saveCart()
    viewCart()

    if (!document.getElementById('cart').checked) {
        document.getElementById('cart').checked = true
    }
}
window.addToCart = addToCart

function saveCart() {
    localStorage.setItem('cart', JSON.stringify(cart))
}

function loadCart() {
    const savedCart = localStorage.getItem('cart')
    if (savedCart) {
        return JSON.parse(savedCart)
    }
    return {}
}

document.getElementById('logoutBtn').addEventListener('click', () => {
    localStorage.clear()
})

function viewCart() {
    if (voucherStatus) {
        renderCart(voucherStatus)
    } else {
        renderCart()
    }
}

document.getElementById('voucher_button').addEventListener("click", async () => {
    const loadingIcon = document.querySelector('.spinner-border')
    loadingIcon.style.display = 'block'
    document.getElementById('voucher_button').style.display = 'none'

    try {
        const response = await fetch('/get-codes')
        const text = await response.text()

        const jsonStart = text.indexOf('{')
        const jsonEnd = text.lastIndexOf('}') + 1
        const cleanText = text.substring(jsonStart, jsonEnd)
        
        const data = JSON.parse(cleanText)

        codes = data
        voucherStatus = true
        viewCart()
    } catch (error) {
        console.error('Error fetching data:', error)
    } finally {
        loadingIcon.style.display = 'none'
    }
})

function renderCart(voucher = false) {
    let cartItems = document.getElementById('cart-items')
    let totalPrice = document.getElementById('total-price')
    let pdv = document.getElementById('pdv')
    let delivery = document.getElementById('delivery-price')
    let finalPrice = document.getElementById('final-price')

    cartItems.innerHTML = ''

    let price = 0

    for (let title in cart) {
        let item = cart[title]
        price += item.amount * item.price
        let itemDiv = document.createElement('div')
        itemDiv.classList.add('order-card')
        itemDiv.innerHTML = `
        <img src="${item.image_url}" alt="${title}" class="order-image">
        <div class="order-detail">
            <p>${title}</p>
            <div class="input-group">
                <button class="btn btn-outline-primary decrement-btn">-</button>
                <input type="text" class="form-control text-center number-field" value="${item.amount}" readonly>
                <button class="btn btn-outline-primary increment-btn">+</button>
            </div>
        </div>
        <h4 class="order-price">${(item.amount * item.price).toFixed(2)} €</h4>
        `
        cartItems.appendChild(itemDiv)

        itemDiv.querySelector('.decrement-btn').addEventListener('click', (event) => {
            decrement(event, title)
        })
        itemDiv.querySelector('.increment-btn').addEventListener('click', (event) => {
            increment(event, title)
        })
    }

    if (voucher) {
        let input = document.getElementById('trop_voucher')
        let voucherInput = input.value
    
        if (codes.hasOwnProperty(voucherInput)) {
            let discount = codes[voucherInput]

            let discountPrice = price - (price * discount)
            
            let pdvPrice = discountPrice * 0.10
            let deliveryPrice = 0
            if (Object.keys(cart).length > 0) {
                deliveryPrice = 5 - (5 * discount)
            }
            let sum = discountPrice + pdvPrice + deliveryPrice

            totalPrice.innerHTML = `${discountPrice.toFixed(2)} €`
            pdv.innerHTML = `${pdvPrice.toFixed(2)} €`
            if (deliveryPrice == (5 - (5 * discount))) {
                delivery.innerHTML = `${deliveryPrice.toFixed(2)} €`
            } else {
                delivery.innerHTML = ''
            }
            finalPrice.innerHTML = `${sum.toFixed(2)} €`
            input.disabled = true
        } else {
            voucherStatus = false
            document.getElementById('voucher_button').style.display = 'block'
        }
    } else {
        let pdvPrice = price * 0.10
        let deliveryPrice = 0
        if (Object.keys(cart).length > 0) {
            deliveryPrice = 5
        }
        let sum = price + pdvPrice + deliveryPrice

        totalPrice.innerHTML = `${price.toFixed(2)} €`
        pdv.innerHTML = `${pdvPrice.toFixed(2)} €`
        if (deliveryPrice == 5) {
            delivery.innerHTML = `${deliveryPrice.toFixed(2)} €`
        } else {
            delivery.innerHTML = ''
        }
        finalPrice.innerHTML = `${sum.toFixed(2)} €`
    }
}

function increment(event, title) {
    event.stopPropagation()
    if (cart[title]) {
        cart[title].amount += 1
        saveCart()
        viewCart()
    }
}

function decrement(event, title) {
    event.stopPropagation();
    if (cart[title]) {
        cart[title].amount -= 1
        if (cart[title].amount < 1) {
            delete cart[title]
        }
        saveCart()
        viewCart()
    }
}

document.addEventListener('DOMContentLoaded', () => {
    let cards = document.querySelectorAll('.dashboard-card')
    
    cards.forEach(card => {
        card.addEventListener('click', () => {
            let title = card.querySelector('.title').innerText.trim()
            let price = card.querySelector('.price').innerText.trim()
            let image = card.querySelector('.card-image').src
            
            price = parseFloat(price.replace('€', '').trim())

            addToCart(title, price, image)
        })
    })

})

document.getElementById('pay-food').addEventListener('click', () => {
    let address = getCookie('deliveryAddress')
    let images = []

    let food = document.querySelectorAll('.order-card')

    food.forEach(item => {
        let img = item.querySelector('img')
        let urlSource = img.src
        let request = urlSource.substring(urlSource.lastIndexOf('/') + 1)
        images.push(request)
    })

    let data = {
        address: address,
        images: images
    }

    function validateData(data) {
        if (!data.address) {
            return "Address is missing! Order failed."
        }

        if (!data.images || data.images.length === 0) {
            return "No food selected! Order failed."
        }

        return null
    }

    let validation = validateData(data)

    if (validation) {
        document.getElementById('order-message').innerHTML = validation
        return
    }

    let xhr = new XMLHttpRequest()
    xhr.open("POST", "/checkout", true)

    xhr.setRequestHeader("Content-Type", "application/json;charset=UTF-8")
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            if (xhr.status === 200) {
                document.getElementById('order-message').innerHTML = 'Order placed successfully!'
            }
        }
    }

    xhr.send(JSON.stringify(data))
})

})()