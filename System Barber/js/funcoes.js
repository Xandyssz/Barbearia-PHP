function SessaoExpirada() {
    alert("WebSite diz: \nSua Sessão foi Expirada!");
}

function loginMensagem(){
    alert('Usuario e/ou senha invalido(s)!');
    window.location.href = "login.php";
}

function OpcaoMensagens($id){
    if ($id === 1)
    {
        window.alert('Registro salvo com sucesso!');
    }

    if ($id === 2)
    {
        window.alert('Registro alterado com sucesso!');

    }

    if ($id === 3)
    {
        window.alert('Registro excluido com sucesso!');
    }


    if ($id === 4)
    {
        window.alert('Email em Uso!');
    }

    if ($id === 5)
    {
        window.alert('Ocorreu um erro!');
    }

    if ($id === 6)
    {
        window.alert('Ocorreu um erro! Esse Dia/Horário Já esta marcado');
    }

}

function confirmacaoExclusaoUsuario(id) {
    var resposta = confirm("Confirmar Exclusão do Usuario??");
    if (resposta == true) {
        window.location.href = "PainelAdminDeletarUsuario.php?codigo_usuario=" + id;
    }
}

function confirmacaoExclusaoServico(id) {
    var resposta = confirm("Confirmar Exclusão do Serviço??");
    if (resposta == true) {
        window.location.href = "PainelAdminDeletarServico.php?codigo_servico=" + id;
    }
}

function confirmacaoExclusaoAgendamento(id) {
    var resposta = confirm("Confirmar Exclusão do Agendamento??");
    if (resposta == true) {
        window.location.href = "PainelAdminDeletarAgendamento.php?codigo_agenda=" + id;
    }
}

function alterarStatusAgendamento(id) {
    var resposta = confirm("Confirmar Atualização do Status de Agendamento??");
    if (resposta == true) {
        window.location.href = "PainelAdminAtualizarAgendamento.php?codigo_agenda=" + id;
    }
}