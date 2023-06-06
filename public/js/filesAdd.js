$(document).ready(function () {
    const addStoreUrl = '/add';
    const pushIndexUrl = '/conteudo/files';
    const uploadForm = $('#upload-form');
    const tabelaDinamica = $('#tabela-dinamica tbody');
    const feedbackMessage = $('#feedback-message');
    const ModalExcluirDadosText = $('#ModaldeExclusao');
    const ModalAlterarDadosText = $('#ModaldeAlteracao');

    carregarDados();

    uploadForm.on('submit', function (e) {
        e.preventDefault();
        const formData = new FormData(this);
        enviarDados(formData);
    });

    function enviarDados(formData) {
        $.ajax({
            url: addStoreUrl,
            type: 'POST',
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
        })
            .done(function (response) {
                feedbackMessage.text('Dados enviados com sucesso.');
                feedbackMessage.removeClass('error').addClass('success');
                popularTabela(response);
            })
            .fail(function (xhr, status, error) {
                feedbackMessage.text('Erro ao enviar dados. Por favor, tente novamente.');
                feedbackMessage.removeClass('success').addClass('error');
                console.error('Erro ao enviar dados', error);
            });
    }

    function carregarDados() {
        $.ajax({
            url: pushIndexUrl,
            type: 'GET',
            dataType: 'json',
        })
            .done(function (data) {
                popularTabela(data);
                // ModalExcluirDados(data);
            })
            .fail(function (xhr, status, error) {
                feedbackMessage.text('Nenhum dado disponível no banco.');
                feedbackMessage.removeClass('success').addClass('error');
                console.error('Erro ao carregar dados', error);
            });
    }

    function popularTabela(data) {
        tabelaDinamica.empty();

        if (data.length === 0) {
            feedbackMessage.text('Nenhum dado disponível.');
            feedbackMessage.removeClass('success').addClass('error');
        } else {
            data.forEach(function (item) {
                const linha = $('<tr>');
                linha.append($('<th>').text(item.id));
                linha.append($('<th>').text(item.title));
                linha.append($('<th>').text(item.description));
                linha.append($('<td>').html(`<img src="${item.path}" width="100" height="100" />`));
                linha.append($('<th>').text(item.type));

                const ModalButtonExc = $('<button type="button" data-bs-toggle="modal" data-bs-target="#staticExcluir' + item.id + '" class="btn btn-danger text-black mt-2">Excluir</button>');
                // ModalButtonExc.click(function () {
                const modalExc = $('<div class="modal fade" id="staticExcluir' + item.id + '" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">');

                let ModalTodoExc = $('<div class="modal-dialog">');
                let modalContentExc = $('<div class="modal-content">');
                let modalHeaderExc = $('<div class="modal-header">');
                let modalBodyExc = $('<div class="modal-body">');
                let modalFooterExc = $('<div class="modal-footer">');
                let modalTitleExc = $('<h2 class="modal-title">').text('Excluir dados do ID: ' + item.id + '?');
                let closeModalBtnExc = $('<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">');
                let confirmationMessageExc = $('<p>').text('Deseja realmente excluir os dados?');
                let cancelButtonExc = $('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">').text('Cancelar');
                let deleteButtonExc = $('<button type="button" class="btn btn-danger" data-bs-dismiss="modal">Excluir</button>');

                deleteButtonExc.click(function () {
                    console.log(item.id);
                    excluirDados(item.id);
                });

                modalHeaderExc.append(modalTitleExc, closeModalBtnExc);
                modalBodyExc.append(confirmationMessageExc);
                modalFooterExc.append(cancelButtonExc, deleteButtonExc);
                modalContentExc.append(modalHeaderExc, modalBodyExc, modalFooterExc);
                ModalTodoExc.append(modalContentExc);
                modalExc.append(ModalTodoExc);
                ModalExcluirDadosText.append(modalExc);
                // });


                const ModalButtonAlt = $('<button type="button" data-bs-toggle="modal" data-bs-target="#staticAlterar" class="btn btn-warning mt-2 ms-3">Alterar</button>');
                // ModalButtonAlt.click(function () {
                const modalAlt = $('<div class="modal fade" id="staticAlterar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">');
                let ModalTodo = $('<div class="modal-dialog">');
                let modalContent = $('<div class="modal-content">');
                let modalHeader = $('<div class="modal-header">');
                let modalBody = $('<div class="modal-body">');
                let modalFooter = $('<div class="modal-footer">');
                let modalTitle = $('<h2 class="modal-title">').text('Alterar dados do ID: ' + item.id + '?');
                let closeModalBtn = $('<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">');
                let confirmationForm = $('<form id="altForm">');
                let estruturaForm = $('<input type="file" name="path" id="path">');
                let cancelButton = $('<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">').text('Cancelar');
                let alterarButton = $('<button type="button" class="btn btn-warning" data-bs-dismiss="modal">Alterar</button>');

                alterarButton.click(function () {
                    console.log(item.id);
                    alterarDados(item.id, estruturaForm);
                });

                modalHeader.append(modalTitle, closeModalBtn);
                confirmationForm.append(estruturaForm);
                modalBody.append(confirmationForm);
                modalFooter.append(cancelButton, alterarButton);
                modalContent.append(modalHeader, modalBody, modalFooter);
                ModalTodo.append(modalContent);
                modalAlt.append(ModalTodo);
                ModalAlterarDadosText.append(modalAlt);
                // });

                linha.append(ModalButtonExc);
                linha.append(ModalButtonAlt);
                tabelaDinamica.append(linha);
            });

            feedbackMessage.text('');
            feedbackMessage.removeClass('success error');
        }
    }

    function alterarDados(id, path) {
        const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Obtém o token CSRF do cabeçalho do documento

        $.ajax({
            url: `/conteudo/alterar/${id}/${path}`,
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Define o token CSRF no cabeçalho da solicitação
            },
        })
            .done(function (response) {
                feedbackMessage.text('Dados alterados com sucesso.');
                feedbackMessage.removeClass('error').addClass('success');
                carregarDados();
            })
            .fail(function (xhr, status, error) {
                feedbackMessage.text('Erro ao alterar dados. Por favor, tente novamente.');
                feedbackMessage.removeClass('success').addClass('error');
                console.error('Erro ao alterar dados', error);
            });
    }

    function excluirDados(id) {
        const csrfToken = $('meta[name="csrf-token"]').attr('content'); // Obtém o token CSRF do cabeçalho do documento

        $.ajax({
            url: `/conteudo/delete/${id}`,
            type: 'POST',
            dataType: 'json',
            headers: {
                'X-CSRF-TOKEN': csrfToken, // Define o token CSRF no cabeçalho da solicitação
            },
        })
            .done(function (response) {
                feedbackMessage.text('Dados excluídos com sucesso.');
                feedbackMessage.removeClass('error').addClass('success');
                carregarDados();
            })
            .fail(function (xhr, status, error) {
                feedbackMessage.text('Erro ao excluir dados. Por favor, tente novamente.');
                feedbackMessage.removeClass('success').addClass('error');
                console.error('Erro ao excluir dados', error);
            });
    }


});
