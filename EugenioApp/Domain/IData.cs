using Domain.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Domain
{
    public interface IData
    {
        public Jogador? CriarJogador(Jogador jogador);

        public IEnumerable<Jogador?> ConsultarJogador();

        public Jogador? ConsultarJogadorNome(Jogador jogador);

        public Jogador? ConsultarJogadorIdade(Jogador jogador);

        public Jogador? ConsultarJogadorID(Jogador jogador);


        // Parte da Classificação
        public Classificacao? CriarClassificacao(Classificacao classificacao);

        public IEnumerable<Classificacao?> ConsultarClassificacao();

        public Classificacao? ConsultarClassificacaoPontuacao(Classificacao classificacao);

        public Classificacao? ConsultarClassificacaoJogador(Classificacao classificacao);

        public Classificacao? ConsultarClassificacaoSessao(Classificacao classificacao);


        // Parte da Configuração
        public Configuracao? CriarConfiguracao(Configuracao configuracao);

        public IEnumerable<Configuracao?> ConsultarConfiguracao();

        public Configuracao? ConsultarConfiguracaoTitulo(Configuracao configuracao);


        // Parte da Teste
        public Teste? CriarTeste(Teste teste);

        public IEnumerable<Teste?> ConsultarTestes();

        public Teste? ConsultarTesteID(Teste teste);

        // Parte da Sessao
        public Sessao? CriarSessao(Sessao sessao);

        public IEnumerable<Sessao?> ConsultarSessao();

        public Sessao? ConsultarSessaoData(Sessao sessao);

        public Sessao? ConsultarSessaoID(Sessao sessao);
    }
}
