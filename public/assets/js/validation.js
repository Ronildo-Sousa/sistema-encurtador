$(document).ready(function () {

    const formLogin = $("#form");
    const formCad = $(".form");
    const formUrl = $("#formUrl");
    const formForget = $("#form-recuperar");
    const formSenha = $("#formSenha");

    const nome = $("#nome");
    const email = $("#email");
    const telefone = $("#telefone");
    const senha = $("#senha");
    const confirmaSenha = $("#confirmarsenha");
    const url = $("#url");
    const emailForget = $("#emailForget");
    const novasenha = $("#novasenha");
    const confnovasenha = $("#confnovasenha");

   


    formLogin.submit(function (e) {
        if (checkInputsLogin() == true) {
            return true;
        }
        return false;
    });

    formCad.submit(function (e) {
        if (checkInputsCad() == true) {
            return true;
        }
        return false;
    });
    
    formUrl.submit(function (e) {
        if (checkUrl() == true) {
            return true;
        }
        return false;    
    });

    formForget.submit(function (e) { 
        if (checkForget() == true) {
            return true;
        }
        return false;
    });

    
    formSenha.submit(function(e) {
        if (checkNovasenha() == true) {
            return true;
        }
        return false;
    });

    $("#btn-result").click(function () { 
        const result = $("#resultado").text();
        navigator.clipboard.writeText(result);
        $(this).text("Url copiada !");
        $(this).addClass("btn btn-success");
    }).on("mouseleave",function () { 
        $(this).text("Copiar Url");
        $(this).removeClass().addClass("btn btn-primary");
    });

    function checkInputsLogin() {
        const emailValue = email.val();
        const senhaValue = senha.val();

        if (emailValue && senhaValue) {
            setSuccessFor(email);
            setSuccessFor(senha);
            return true;
        }

        if (emailValue === '') {
            setErrorFor(email, 'Insira um email !');
        } else if (!isEmail(emailValue)) {
            setErrorFor(email, 'Email inválido !');
        } else {
            setSuccessFor(email);
        }

        if (senhaValue === '') {
            setErrorFor(senha, "Insira uma senha !");
        } else {
            setSuccessFor(senha);
        }

    }

    function checkInputsCad() {
        const nomeValue = nome.val();
        const emailValue = email.val();
        const telefoneValue = telefone.val();
        const senhaValue = senha.val();
        const confirmaSenhaValue = confirmaSenha.val();

        var verificado = 0;


        if (nomeValue === '') {
            setErrorFor(nome, 'Insira um nome !');
        } else {
            setSuccessFor(nome);
            verificado = verificado + 1;
        }

        if (emailValue === '') {
            setErrorFor(email, 'Insira um email !');
        } else if (!isEmail(emailValue)) {
            setErrorFor(email, 'Email inválido !');
        } else {
            setSuccessFor(email);
            verificado = verificado + 1;
        }

        if (senhaValue === '') {
            setErrorFor(senha, "Insira uma senha !");
        } else {
            setSuccessFor(senha);
            verificado = verificado + 1;
        }

        if (telefoneValue === '') {
            setErrorFor(telefone, "Insira um telefone !");
        } else {
            setSuccessFor(telefone);
            verificado = verificado + 1;
        }

        if (confirmaSenhaValue === '') {
            setErrorFor(confirmaSenha, "Insira a senha novamente !");
        } else {
            if (confirmaSenhaValue !== senhaValue) {
                setErrorFor(confirmaSenha, "As senhas não podem ser diferentes!");
            } else {
                setSuccessFor(confirmaSenha);
                verificado = verificado + 1;
            }
        }
        if (verificado == 5) {
            return true;
        }
    }

    function checkUrl() { 
        const urlValue = url.val();

        if (urlValue === '') {
            setErrorFor(url, "Insira uma url !");
        } else {
            setSuccessFor(url);
            return true;
        }
    }

    function checkForget() { 
        const emailForgetValue = emailForget.val();
        
        if (emailForgetValue === '') {
            setErrorFor(emailForget, "Insira um email !");
        } else if (!isEmail(emailForgetValue)) {
            setErrorFor(emailForget, "Email inválido !");
        } else {
            setSuccessFor(emailForget);
            return true;
        }
    }

    function checkNovasenha() {
        const novasenhaValue = novasenha.val();
        const confnovasenhaValue = confnovasenha.val();

        var verificado = 0;

        if(novasenhaValue === '') {
            setErrorFor(novasenha, "Informe uma senha !")
        } else {
            setSuccessFor(novasenha);
            verificado = verificado + 1;
        }

        if (confnovasenhaValue === '') {
            setErrorFor(confnovasenha, "Insira a senha novamente !");
        } else {
            if (confnovasenhaValue !== novasenhaValue) {
                setErrorFor(confnovasenha, "As senhas não podem ser diferentes!");
            } else {
                setSuccessFor(confnovasenha);
                verificado = verificado + 1;
            }
        }

        if(verificado == 2) {
            return true;
        }
    }

    function setErrorFor(input, message) {
        $(input).css("border", "3px solid red");

        const small = input.parent().children().last();
        small.text(message).css("color", "red").fadeIn(300);
        $(input).focus();
    }

    function setSuccessFor(input) {
        const small = input.parent().children().last();
        $(input).css("border", "3px solid #00bb48")

        small.fadeOut();
    }

    function isEmail(email) {
        return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(email);
    }

});