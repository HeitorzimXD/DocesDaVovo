document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleForm");
    const sugestaoForm = document.getElementById("sugestaoForm");
    const enviarBotao = document.getElementById("enviarSugestao");

    // Inicializa o botão com o texto "Fazer Sugestão"
    toggleButton.textContent = "Fazer Sugestão";

    // Alterna a visibilidade do formulário e o texto do botão
    toggleButton.addEventListener("click", function () {
        document.getElementById("error").innerText = "";
        if (sugestaoForm.style.display === "none" || sugestaoForm.style.display === "") {
            sugestaoForm.style.display = "block";
            
            toggleButton.textContent = "Cancelar Sugestão";  // Altera o texto para "Cancelar Sugestão"
        } else {
            sugestaoForm.style.display = "none";
            toggleButton.textContent = "Fazer Sugestão";  // Altera o texto para "Fazer Sugestão"
        }
    });
    /*
    enviarBotao.addEventListener("click", function (event) {
        event.preventDefault(); // Previne o comportamento padrão do formulário
        
        // Pegue os dados do formulário
        const nome = document.getElementById("nome").value;
        const email = document.getElementById("email").value;
        const mensagem = document.getElementById("mensagem").value;

        // Valide se todos os campos estão preenchidos
        if (!nome || !email || !mensagem) {
            //document.getElementById("error").innerText = 
           // nome === "" || email === "" || mensagem === "" ? "Por favor, preencha todos os campos." : "";
            return; // Impede a execução do código se algum campo estiver vazio
        }
        
    });
    */

    function validarBotao () {
        let nome = document.getElementById("nome").value;
        let email = document.getElementById("email").value;
        let mensagem = document.getElementById("mensagem").value;

        if (nome === "" || email === "" || mensagem === "") {
            alert("Todos os campos são obrigtórios!");
            return false;
        }
        return true;
    }
});



/*
        // Cria uma mensagem no formato de texto para enviar via WhatsApp
        const mensagemWhatsApp = `Nome: ${nome}\nE-mail: ${email}\nMensagem: ${mensagem}`;
        
        // Crie a URL para enviar a mensagem pelo WhatsApp
        const numeroWhatsApp = "5534996698226"; // Substitua pelo número que você deseja usar
        const urlWhatsApp = `https://wa.me/${numeroWhatsApp}?text=${encodeURIComponent(mensagemWhatsApp)}`;

        // Abre o WhatsApp com a mensagem pré-preenchida
        window.open(urlWhatsApp, "_blank");
        
        // Limpar campos após o envio
        document.getElementById("nome").value = "";
        document.getElementById("email").value = "";
        document.getElementById("mensagem").value = "";
        */