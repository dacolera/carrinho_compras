/**
 * Valida os dados para adicionar produto ao carrinho
 * @return boolean
 */
function adicionarAoCarrinho()
{
	$("#adicionar-carrinho").click(function(){
		var produtoId = $("input[name=produtoId]").val();
		var quantidade = $("input[name=quantidade]").val();
		
		if (!quantidade) {
			alert("Digite uma quantidade");
			return false;
		}
		
		ajaxAdicionar(produtoId, quantidade);
	})
}

/**
 * Faz a requisição ao servidor para adicionar o produto no carrinho
 * @return boolean
 */
function ajaxAdicionar(produtoId, quantidade)
{
	$.ajax({
  		method: "POST",
  		url: "/carrinho/adicionar-produto/",
  		data: {
  			produtoId: produtoId,
  			quantidade: quantidade
  		},
  		dataType: "json",
	  	success:function(response) {
	    	console.log(response);
	  	}		
	});
}

$(document).ready(function(){
	adicionarAoCarrinho();
});