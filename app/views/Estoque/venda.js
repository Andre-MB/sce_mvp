
//Venda de produto
var items = [];

let addProduto = () => {
    let nomedoproduto = document.getElementById('nivel');
    let quantidade = document.querySelector('input[name=quantee]');
    let valorquantidade = document.querySelector('input[name=valoe]');
    let total = document.getElementById('total');

    if (nomedoproduto.value != 0 && quantidade.value != 0 && valorquantidade.value != 0) {
        items.push({
            nome: nomedoproduto.value,
            quantidades: quantidade.value.replace(",", "."),
            valo: valorquantidade.value.replace(",", ".")
        })
    }

    console.log(items)

    let lista_produtos = document.querySelector('.result_prodt')

    lista_produtos.innerHTML = '';

    let soma = 0;
    let produto = 0;

    items.map(function (val) {
        //produto = parseFloat(val.quantidades) * parseFloat(val.valo);

        produto = parseFloat((val.quantidades)) * parseFloat((val.valo))
        soma += produto

        lista_produtos.innerHTML +=
            `
                <div class="header_prodt">
                    <h5>` + val.nome + `</h5>
                    <div class="header_prodt_div">
                        <div class="child_header_item">
                            <h5>` + parseFloat(val.quantidades).toString().replace(".", ",") + `</h5>
                            <h5>R$` + parseFloat(val.valo).toFixed(2).toString().replace(".", ",") + `</h5>
                            <h5>R$`+ produto.toFixed(2).toString().replace(".", ",") + `</h5>
                        </div>
                        <img onclick="delProduto(`+ items.indexOf(val) + `)" src="../../../img/MENOSVENDA.png" >
                    </div>
                </div>
                <h5 class="pontos">•••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••••</h5>
            `;

    })

    nomedoproduto.value = ''
    quantidade.value = ''
    valorquantidade.value = ''

    total.innerHTML = 'Total da venda: R$ ' + soma.toFixed(2).toString().replace(".", ",");

};

function delProduto(idItem) {
    items.splice(idItem, 1)
    addProduto()
};

function semString(i) {
    var v = i.value;

    // impede entrar outro caractere que não seja número
    if (v[v.length - 1] == ',' || v[v.length - 1] == '.') {

    } else if (isNaN(v[v.length - 1])) {
        i.value = v.substring(0, v.length - 1);
        return;
    }
}

