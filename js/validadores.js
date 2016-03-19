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
 
 
   function validarCNPJ(f,campo){

         pri = eval("document."+f+"."+campo+".value.substring(0,2)");
         seg = eval("document."+f+"."+campo+".value.substring(3,6)");
         ter = eval("document."+f+"."+campo+".value.substring(7,10)");
         qua = eval("document."+f+"."+campo+".value.substring(11,15)");
         qui = eval("document."+f+"."+campo+".value.substring(16,18)");

         var i;
         var numero;
         var situacao = '';

         numero = (pri+seg+ter+qua+qui);

         s = numero;


         c = s.substr(0,12);
         var dv = s.substr(12,2);
         var d1 = 0;

         for (i = 0; i < 12; i++){
            d1 += c.charAt(11-i)*(2+(i % 8));
         }

         if (d1 == 0){
            var result = "falso";
         }
            d1 = 11 - (d1 % 11);

         if (d1 > 9) d1 = 0;

            if (dv.charAt(0) != d1){
               var result = "falso";
            }

         d1 *= 2;
         for (i = 0; i < 12; i++){
            d1 += c.charAt(11-i)*(2+((i+1) % 8));
         }

         d1 = 11 - (d1 % 11);
         if (d1 > 9) d1 = 0;

            if (dv.charAt(1) != d1){
               var result = "falso";
            }


         if (result == "falso") {
            alert("CNPJ inválido!");
            aux1 = eval("document."+f+"."+campo+".focus");
            aux2 = eval("document."+f+"."+campo+".value = ''");

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
        return v.replace(/\d/g,"") //Remove tudo o que não é Letra
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
