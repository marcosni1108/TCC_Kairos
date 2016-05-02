function validarCPF( cpf ){
	var filtro = /^\d{3}.\d{3}.\d{3}-\d{2}$/i;
	
	if(!filtro.test(cpf))
	{
		window.alert("CPF inválido. Tente novamente.");
                document.getElementById('cpf').value=''; // Limpa o campo
		return false;
	}
   
	cpf = remove(cpf, ".");
	cpf = remove(cpf, "-");
	
	if(cpf.length != 11 || cpf == "00000000000" || cpf == "11111111111" ||
		cpf == "22222222222" || cpf == "33333333333" || cpf == "44444444444" ||
		cpf == "55555555555" || cpf == "66666666666" || cpf == "77777777777" ||
		cpf == "88888888888" || cpf == "99999999999")
	{
		window.alert("CPF inválido. Tente novamente.");
                document.getElementById('cpf').value=''; // Limpa o campo
		return false;
   }

	soma = 0;
	for(i = 0; i < 9; i++)
	{
		soma += parseInt(cpf.charAt(i)) * (10 - i);
	}
	
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	if(resto != parseInt(cpf.charAt(9))){
		window.alert("CPF inválido. Tente novamente.");
                document.getElementById('cpf').value=''; // Limpa o campo
		return false;
	}
	
	soma = 0;
	for(i = 0; i < 10; i ++)
	{
		soma += parseInt(cpf.charAt(i)) * (11 - i);
	}
	resto = 11 - (soma % 11);
	if(resto == 10 || resto == 11)
	{
		resto = 0;
	}
	
	if(resto != parseInt(cpf.charAt(10))){
		window.alert("CPF inválido. Tente novamente.");
                document.getElementById('cpf').value=''; // Limpa o campo                
		return false;
	}
	
	return true;
 }
 
 
	function validarCNPJ( cnpj ){
			var filtro = /^\d{2}\.\d{3}\.\d{3}\/\d{4}\-\d{2}$/i;
			
			
			if(!filtro.test(cnpj))
			{
				window.alert("CNPJ inválido.");
						document.getElementById('cnpj').value=''; // Limpa o campo
				return false;
			}
		  
			var novoCNPJ = cnpj.replace(/[\/.-]/g, "");
			//alert(novoCNPJ);
			
			if (novoCNPJ == "00000000000000" || 
				novoCNPJ == "11111111111111" || 
				novoCNPJ == "22222222222222" || 
				novoCNPJ == "33333333333333" || 
				novoCNPJ == "44444444444444" || 
				novoCNPJ == "55555555555555" || 
				novoCNPJ == "66666666666666" || 
				novoCNPJ == "77777777777777" || 
				novoCNPJ == "88888888888888" || 
				novoCNPJ == "99999999999999")
				{
					window.alert("CNPJ inválido.");
							document.getElementById('cnpj').value=''; // Limpa o campo
					return false;
				}
				
			tamanho = novoCNPJ.length - 2
			numeros = novoCNPJ.substring(0,tamanho);
			digitos = novoCNPJ.substring(tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			  soma += numeros.charAt(tamanho - i) * pos--;
			  if (pos < 2)
					pos = 9;
			}
			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(0)){
                            window.alert("CNPJ inválido.");
                            document.getElementById('cnpj').value='';
				return false;
                            }
			tamanho = tamanho + 1;
			numeros = novoCNPJ.substring(0,tamanho);
			soma = 0;
			pos = tamanho - 7;
			for (i = tamanho; i >= 1; i--) {
			  soma += numeros.charAt(tamanho - i) * pos--;
			  if (pos < 2)
					pos = 9;
			}
			resultado = soma % 11 < 2 ? 0 : 11 - soma % 11;
			if (resultado != digitos.charAt(1)){
                            window.alert("CNPJ inválido.");
                            document.getElementById('cnpj').value='';
			 return false;
			}
			else{
//			window.alert("CNPJ valido");
//			document.getElementById('cnpj').value='';
							
				return true;
				
			}
				 
				   
				
		}
   
 
 
 
 
 
 
function remove(str, sub) {
	i = str.indexOf(sub);
	r = "";
	if (i == -1) return str;
	{
		r += str.substring(0,i) + remove(str.substring(i + sub.length), sub);
	}
	
	return r;
}

/**
   * MASCARA ( mascara(o,f) e execmascara() ) CRIADAS POR ELCIO LUIZ
   * elcio.com.br
   */
function mascara(o,f){
	v_obj=o
	v_fun=f
	setTimeout("execmascara()",1)
}

function execmascara(){
	v_obj.value=v_fun(v_obj.value)
}

function cpf_mask(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
	v=v.replace(/(\d{3})(\d)/,"$1-$2")   //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos
	return v
}

function cep_mask(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
	v=v.replace(/(\d{5})(\d)/,"$1-$2")    //Coloca ponto entre o terceiro e o quarto dígitos
	return v
}

function cnpj_mask(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
	v=v.replace(/(\d{2})(\d)/,"$1.$2")    //Coloca ponto entre o terceiro e o quarto dígitos
	v=v.replace(/(\d{3})(\d)/,"$1.$2")    //Coloca ponto entre o setimo e o oitava dígitos
        v=v.replace(/(\d{3})(\d)/,"$1/$2")    //Coloca ponto entre o setimo e o oitava dígitos
        v=v.replace(/(\d{4})(\d)/,"$1-$2")    //Coloca ponto entre o decimoprimeiro e o decimosegundo dígitos  
	return v
}

function soLetras(v){
        return v.replace(/^\s*[^+sa-zA-ZçÇãÃõÕéÉóÓúÚáÁ]+/g,"") //Remove tudo o que nÃ£o Ã© Letra
}
function soLetrasMA(v){
        v=v.toUpperCase() //Maiúsculas
        return v.replace(/\d/g,"") //Remove tudo o que não é Letra ->maiusculas
}
function soLetrasMI(v){
        v=v.toLowerCase() //Minusculas
        return v.replace(/\d/g,"") //Remove tudo o que não é Letra ->minusculas
}
function soNumeros(v){
        return v.replace(/\D/g,"") //Remove tudo o que não é dígito
}
function hora(v){
	v=v.replace(/\D/g,"")                 //Remove tudo o que não é dígito
	return v.replace(/(\d{2})(\d)/,"$1:$2")
	
}