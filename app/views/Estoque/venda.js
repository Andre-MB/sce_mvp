

//Venda de produto
var items = [];


let addProduto = () => {
    let nomedoproduto = document.getElementById('nivel');
    let quantidade = document.querySelector('input[name=quantee]');
    let valorquantidade = document.querySelector('input[name=valoe]');

    items.push({
        nome: nomedoproduto.value,
        quantidades: quantidade.value,
        valo: valorquantidade.value
    })

    let lista_produtos = document.querySelector('.result_prodt')

    lista_produtos.innerHTML = '';

    let soma = 0;
    let produto = 0;

    items.map(function (val) {
        produto = parseFloat(val.quantidades * val.valo);
        soma += produto

        lista_produtos.innerHTML +=
            `
                    <div class="lista_produtos_single">
                        <h5>` + val.nome + `</h5>
                        <h5>` + val.quantidades + `</h5>
                        <h5>R$` + val.valo + `</h5>
                        <h5>R$`+ produto + `</h5>
                    </div>
                    `;

    })

    soma = soma.toFixed(2)

    nomedoproduto.value = ''
    quantidade.value = ''
    valorquantidade.value = ''

    var total = document.getElementById('total');
    total.innerHTML = 'Total: R$' + soma;

}



