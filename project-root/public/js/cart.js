let cart = {}
let voucherStatus = false

function addToCart(title, price, image_url) {
    if (!cart[title]) {
        cart[title] = {amount: 1, price: price, image_url: image_url}
    }

    viewCart()

    if (!document.getElementById('cart').checked) {
        document.getElementById('cart').checked = true
    }
}

function viewCart() {
    if (voucherStatus) {
        renderCart(voucherStatus)
    } else {
        renderCart()
    }
}

document.getElementById('voucher_button').addEventListener("click", () => {
    if (Object.keys(cart).length > 0) {
        voucherStatus = true
    }
    
    viewCart()
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
                <button class="btn btn-outline-primary" onclick="decrement(event, '${title}')">-</button>
                <input type="text" class="form-control text-center number-field" value="${item.amount}" readonly>
                <button class="btn btn-outline-primary" onclick="increment(event, '${title}')">+</button>
            </div>
        </div>
        <h4 class="order-price">${(item.amount * item.price).toFixed(2)} €</h4>
        `
        cartItems.appendChild(itemDiv)
    }

    if (voucher) {
        const codes = {
            "trop-delivery-2002": 0.2,
            "onin-majstor-256": 0.3,
            "fit-mediteran-06": 0.5,
            "skendza-car-99": 0.6,
            "mini-cooper-bean": 0.1
        }
        
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

            document.getElementById('voucher_button').style.display = 'none'
            input.disabled = true
        } else {
            voucherStatus = false
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
        viewCart()
    }
}

document.addEventListener('DOMContentLoaded', () => {
    let cards = document.querySelectorAll('.dashboard-card')
    
    cards.forEach(card => {
        card.addEventListener('click', () => {
            let title = card.querySelector('.title').innerText.trim()
            let price = card.querySelector('.price').innerText.trim()
            let image = card.querySelector('.card-image').src;
            
            price = parseFloat(price.replace('€', '').trim())

            addToCart(title, price, image)
        })
    })

})