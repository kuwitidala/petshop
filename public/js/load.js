let offset = 0;
let limit = 4;
function loadNew() {
    fetch(`/load-more-products?offset=${offset}&limit=${limit}`)
        .then(res => res.json())
        .then(data => {

            const container = document.getElementById('product-grid');

            data.forEach(product => {
                container.innerHTML += `
                    <div class="product-card" >
                        <div class="card-content " onclick="window.location='/product/${product.id}'">
                            <div class="product-image">
                            <img src="images/products/${product.image}" alt="${product.name }">
                            </div>
                            <span class="price">${product.price} ₽</span>
                            <p class="card-title" >${product.title }</p>
                            <p class="card-desc">${product.shortDescription}</p>
                            
                        </div>

                        ${
                            isAuth
                            ? `
                            <form action="/cart/add/${product.id}" method="POST" onclick="event.stopPropagation();">
                                <input type="hidden" name="_token" value="${csrfToken}">
                                <button type="submit" class="cart-button"
                                        onclick="alert('Товар добавлен в корзину')">
                                    Купить
                                </button>
                            </form>`
                            
                            : `
                            <button class="cart-button"
                                    onclick="event.stopPropagation(); alert('Чтобы добавить товар в корзину, войдите в профиль')">
                                Купить
                            </button>`
                            
                        }
                    </div>`
                    ;
                });

            offset += data.length;
            limit = 12;
            if (data.length === 0) {
                document.getElementById('btn-load').style.display = 'none';
            }
        });
}
document.getElementById('btn-load').addEventListener('click', loadNew);
loadNew();



