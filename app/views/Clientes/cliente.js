var modal = document.getElementById('add');

window.onclick = function (event) {
    if (event.target === modal) {
        location.href = '../Clientes/clientes.php'
    }
}

function validarCnpjCpf(i) {

    var v = i.value;

    // impede entrar outro caractere que não seja número
    if (isNaN(v[v.length - 1])) {
        i.value = v.substring(0, v.length - 1);
        return;
    }

    if (v.length < 15) {

        if (v.length == 3 || v.length == 7) i.value += ".";
        if (v.length == 11) i.value += "-";

    } else if (v.length < 16) {

        i.value = ((v.split(".")).join("").split("-"))

        let n = i.value;

        n = n.split(",").join("")

        n = n.split("")

        n.splice(2, 0, ".")
        n.splice(6, 0, ".")
        n.splice(10, 0, "/")

        n = n.join("")
        i.value = n

        if (n.length == 15) i.value += "-";

    } else {
        i.setAttribute("maxlength", "18");
    }

}

function isEmailValida(i) {

    var email = i.value;

    // cria uma regex para validar email
    const emailRegex = new RegExp(
        /^[a-zA-Z0-9._-]+@[a-zA-Z0-9._-]+\.[a-zA-Z]{2,}$/
    )

    if (emailRegex.test(email)) {

    } else {
        alert("Não é um email válido")
    }
}
var isBackspacePressed = false;

function isCelular(input) {
    var v = input.value;

    document.addEventListener("keydown", function (event) {
        console.log(event.key);

        if (event.key === "Backspace" && !isBackspacePressed) {
            console.log("Apertou backspace");

            var valor = input.value;

            if (valor.length > 0) {
                input.value = valor.slice(0, -1);
            }

            isBackspacePressed = true;
        }
    });

    document.addEventListener("keyup", function (event) {
        if (event.key === "Backspace") {
            isBackspacePressed = false;
        }
    });

    if (v[v.length - 1] != '(' && v[v.length - 1] != ')') {
        if (isNaN(v[v.length - 1])) {
            input.value = v.substring(0, v.length - 1);
            return;
        }

        if (v.length < 2) {
            let t = [v];
            t.unshift('(');
            input.value = t.join('');
        }
    }
    if (v.length == 10) {
        input.value += '-';
    }

    if (v.length == 3) {
        input.value += ') ';
    }

    input.setAttribute("maxlength", "15");

}


function semString(i) {
    var v = i.value;

    // impede entrar outro caractere que não seja número
    if (v[v.length - 1] == ',' || v[v.length - 1] == '.' || v[v.length - 1] == '-' || v[v.length - 1] == '(' || v[v.length - 1] == ')') {

    } else if (isNaN(v[v.length - 1])) {
        i.value = v.substring(0, v.length - 1);
        return;
    }
}