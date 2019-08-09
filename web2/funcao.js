
function obterValorUnitario(id) {
  console.log("id: "+id);
  for (produto of produtos) {
//    console.log(produto);
    if (produto.id == id) {
      return produto.valor_unitario;
    }
  }
  return 0;
}
function adiciona() {
  var selectProduto = document.querySelector("#produto_id");
  var optionSelected = selectProduto.options[selectProduto.selectedIndex];
  var quantidade = document.querySelector("#quantidade").value;
  // alert("Eu gostaria de adicionar: \nProduto-id: "+optionSelected.value+
  // "\nDescrição: "+optionSelected.text+
  // "\nQuantidade: "+quantidade);
  var corpoTabela = document.querySelector("#tbody-items");
  var newLine = corpoTabela.insertRow(-1);
  var celula1 = newLine.insertCell(-1);
  celula1.innerHTML = "<input type='text' name='produto_id[]' value= "+optionSelected.value+" readonly>";
  var celula2 = newLine.insertCell(-1);
  celula2.innerHTML = optionSelected.text;
  var celula3 = newLine.insertCell(-1);
  celula3.innerHTML = "<input type='text' name='quant[]' value= "+quantidade+" readonly>";
  var valorUnitario = obterValorUnitario(parseInt(optionSelected.value));
  var valorTotal = parseInt(quantidade) * valorUnitario;
  soma = soma + valorTotal;
  var th_soma = document.querySelector("#th-soma");
  var celula4 = newLine.insertCell(-1);
  celula4.innerHTML = valorUnitario;
  var celula5 = newLine.insertCell(-1);
  celula5.innerHTML = valorTotal;
  th_soma.innerHTML = soma;
  var celula6 = newLine.insertCell(-1);
  celula6.innerHTML = "<button type='button' onclick=excluir(this)>x</button>";
}

function excluir(button) {
  // console.log(button);
  var linha = button.parentElement.parentElement;
  linha.remove();
  // alert("excluindo item ...");
}
