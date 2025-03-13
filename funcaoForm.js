document.addEventListener("DOMContentLoaded", function () {
    const toggleButton = document.getElementById("toggleForm");
    const sugestaoForm = document.getElementById("sugestaoForm");
    const enviarBotao = document.getElementById("enviarBotao");

    document.getElementById("msgWhats").addEventListener("click", function() {
        const mensagem = encodeURIComponent("Olá, gostaria de fazer um pedido!");
        window.open(`https://wa.me/5534996698226?text=${mensagem}`, "_blank");
    });
    
    // Lista de imagens que serão exibidas
    const imagens = ["bolim_capa.png", "bolo_chocolate.png", "brigadeiro.png"];
    let index = 0;
    const imgElement = document.getElementById("capa");

    function trocarImagem() {
        imgElement.style.opacity = 0; // Aplica fade-out antes da troca

        setTimeout(() => {
            index = (index + 1) % imagens.length;
            imgElement.src = imagens[index];
            imgElement.style.opacity = 1; // Aplica fade-in após a troca
        }, 1000); // Tempo para a imagem desaparecer antes da troca
    }

    setInterval(trocarImagem, 5000);


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


    enviarBotao.addEventListener("click", function (event) {
        event.preventDefault(); // Previne o comportamento padrão do formulário

        // Pegue os dados do formulário
        const nome = document.getElementById("nome").value.trim();
        const email = document.getElementById("email").value.trim();
        const mensagem = document.getElementById("mensagem").value.trim();

        // Valide se todos os campos estão preenchidos
        if (!nome || !email || !mensagem) {
            document.getElementById("error").innerText = 
            nome === "" || email === "" || mensagem === "" ? "Por favor, preencha todos os campos." : "";
            return; // Impede a execução do código se algum campo estiver vazio
        }  else {
            document.getElementById("sugestaoForm").submit();
            document.getElementById("error").innerText = "Mensagem enviada com sucesso!"
        } 
    
        // Limpar campos após o envio
        document.getElementById("nome").value = "";
        document.getElementById("email").value = "";
        document.getElementById("mensagem").value = "";
    });
});




/*
document.addEventListener("DOMContentLoaded", function () {
    console.log("Script carregado");

    const toggleButton = document.getElementById("toggleForm");
    const sugestaoForm = document.getElementById("sugestaoForm");
    const enviarBotao = document.getElementById("enviarSugestao");

    // Inicializa o botão com o texto "Fazer Sugestão"
    toggleButton.textContent = "Fazer Sugestão";

    // Alterna a visibilidade do formulário e o texto do botão
    toggleButton.addEventListener("click", function () {
        document.getElementById("error").innerText = ""; // Limpa mensagens de erro

        if (sugestaoForm.style.display === "none" || sugestaoForm.style.display === "") {
            sugestaoForm.style.display = "block";
            toggleButton.textContent = "Cancelar Sugestão";
        } else {
            sugestaoForm.style.display = "none";
            toggleButton.textContent = "Fazer Sugestão";
        }
    });

    // Função de envio de sugestão
    enviarBotao.addEventListener("click", function () {
        console.log("Botão clicado");

        const nome = document.getElementById("nome").value.trim();
        const email = document.getElementById("email").value.trim();
        const mensagem = document.getElementById("mensagem").value.trim();
        const errorSpan = document.getElementById("error");

        // Verifica se os campos estão preenchidos
        if (!nome || !email || !mensagem) {
            errorSpan.innerText = "Por favor, preencha todos os campos.";
            return;
        }

        // Limpa mensagens de erro
        errorSpan.innerText = "";

        // Envia o formulário
        console.log("Enviando formulário...");
        document.getElementById("sugestaoForm").submit();
    });
});

        --Função para enviar o formulário pelo Whats-App--
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

        --Função alternativa de validar os campos preenchidos--

        function validarBotao() {
            let nome = document.getElementById("nome").value;
            let email = document.getElementById("email").value;
            let mensagem = document.getElementById("mensagem").value;
    
            if (nome === "" || email === "" || mensagem === "") {
                alert("Todos os campos são obrigtórios!");
                return false;
            }
            return true;
        }
        */