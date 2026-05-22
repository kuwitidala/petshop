let offsetSt = 0;
let limitSt = 4;
function loadStock() {
    fetch(`/load-more-products?offset=${offsetSt}&limit=${limitSt}`)
        .then(res => res.json())
        .then(data => {

            const container = document.getElementById('stock-contain');

            data.forEach(stock => {
                container.innerHTML += `
                    <div class="stock-card" >
                            <img src="images/stocks/${stocks.image}" alt="${stocks.name }">
                            <div class="card-stock-content">
                                <h6>${stock.title }</h6>
                                <p>${stock.description}</p>
                        </div>
                    </div>`
                    ;
                });

            offsetSt += data.length;
            limitSt = 12;
            if (data.length === 0) {
                document.getElementById('btn-load').style.display = 'none';
            }
        });
}
document.getElementById('btn-load').addEventListener('click', loadNew);
loadNew();