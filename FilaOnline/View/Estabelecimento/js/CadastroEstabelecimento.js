// Mascara de CNPJ
const handleCnpj = (event) => {
  let cnpj = event.target
  cnpj.value = cnpjMask(cnpj.value)
}
const cnpjMask = (value) => {
  if (!value) return ""
  value = value.replace(/\D/g,"")                           
  value = value.replace(/^(\d{2})(\d)/,"$1.$2")             
  value = value.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3") 
  value = value.replace(/\.(\d{3})(\d)/,".$1/$2")           
  value = value.replace(/(\d{4})(\d)/,"$1-$2")              
  return value
}

// Para mostrar e esconder senha
function togglePass() {
    const senha = document.getElementById("senha");
  if (senha.type === "password") {
    senha.type = "text";
    document.getElementsById("btnsenha").innerHTML = "teste";
  } else {
    senha.type = "password";
  }
}