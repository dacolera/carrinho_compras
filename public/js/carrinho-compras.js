/**
 * Valida os dados para adicionar produto ao carrinho
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
		
		var data = {
			produtoId: produtoId,
			quantidade: quantidade
		};

		manipularCarrinho('/carrinho/adicionar-produto/', data);
	})
}

/**
 * Valida os dados para remover o produto do carrinho
 */
function removerDoCarrinho(produtoId)
{
	var data = {
		produtoId: produtoId
	};

	manipularCarrinho('/carrinho/remover-produto/', data);

	$("#produto-" + produtoId).html("");
}

/**
 * Faz a requisição ao servidor para manipular o produto no carrinho
 * @return boolean
 */
function manipularCarrinho(url, data)
{
	$.ajax({
  		method: "POST",
  		url: url,
  		data: data,
  		dataType: "json",
	  	success:function(response) {
	    	alert(response.message)
	  	}		
	});
}

$(document).ready(function(){
	adicionarAoCarrinho();
});