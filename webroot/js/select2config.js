function select2GithubConfig(url) {
    $.fn.select2.defaults.set('language', 'pt-BR');
    return {
        ajax: {
            url: url,
            dataType: 'json',
            type: 'GET',
            delay: 1000,
            data: function (params) {
                // configura o parâmetro GET username como o atributo term do select2
                return {q: params.term}
            },
            processResults: function(data) {
                return {
                    results: $.map(data, function(item) {
                        return {
                            id: item.login,
                            login: item.login,
                            avatar: item.avatar,
                            url: item.url,
                        }
                    })
                }
            },
        },
        language: { // Workaround para um bug no select2 que exibe a mensagem incorreta - https://github.com/select2/select2/issues/4355
            errorLoading: function() {
                return 'Pesquisando...';
            }
        },
        allowClear: true,
        escapeMarkup: function(markup) { return markup; }, // "evita" a função que escapa markup HTML do select2
        templateResult: function(dados) { // Markup dos resultados no dropdown
            if (dados.loading) return null; // Não formata se ainda está carregando a requisição
            var avatar = (dados.avatar ? dados.avatar : 'http://via.placeholder.com/435x435'); // Coloca um placeholder se não tiver avatar
            return '<div class="github-wrapper">' +
                    '<img src="' + avatar + '" />' +
                    '<span class="login">&nbsp;' + dados.login + '</span>' +
                '</div>'
        },
        templateSelection: function(dados) { // Markup do resultado selecionado
            if (!dados.login) { // Se não tiver login, é algum texto padrão ou placeholder do select2
                return dados.text
            }
            var avatar = (dados.avatar ? dados.avatar : 'http://via.placeholder.com/435x435'); // Coloca um placeholder se não tiver avatar
            return '<div class="github-wrapper small">' +
                '<img src="' + avatar + '" />' +
                '<span class="login">&nbsp;' + dados.login + '</span>' +
                '</div>';
        },
        minimumInputLength: 3,
    }
}