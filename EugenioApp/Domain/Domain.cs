using Domain.Models;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Domain
{
    public class Domain : IDomain
    {
        private IData _data;

        private Domain(IData data)
        {
            _data = data;
        }

        public IEnumerable<Classificacao?> ConsultarClassificacao()
        {
            throw new NotImplementedException();
        }

        public Classificacao? ConsultarClassificacaoJogador(Classificacao classificacao)
        {
            throw new NotImplementedException();
        }

        public Classificacao? ConsultarClassificacaoPontuacao(Classificacao classificacao)
        {
            throw new NotImplementedException();
        }

        public Classificacao? ConsultarClassificacaoSessao(Classificacao classificacao)
        {
            throw new NotImplementedException();
        }

        public IEnumerable<Configuracao?> ConsultarConfiguracao()
        {
            throw new NotImplementedException();
        }

        public Configuracao? ConsultarConfiguracaoTitulo(Configuracao configuracao)
        {
            throw new NotImplementedException();
        }

        public IEnumerable<Jogador?> ConsultarJogador()
        {
            throw new NotImplementedException();
        }

        public Jogador? ConsultarJogadorID(Jogador jogador)
        {
            throw new NotImplementedException();
        }

        public Jogador? ConsultarJogadorIdade(Jogador jogador)
        {
            throw new NotImplementedException();
        }

        public Jogador? ConsultarJogadorNome(Jogador jogador)
        {
            throw new NotImplementedException();
        }

        public IEnumerable<Sessao?> ConsultarSessao()
        {
            throw new NotImplementedException();
        }

        public Sessao? ConsultarSessaoData(Sessao sessao)
        {
            throw new NotImplementedException();
        }

        public Sessao? ConsultarSessaoID(Sessao sessao)
        {
            throw new NotImplementedException();
        }

        public Teste? ConsultarTesteID(Teste teste)
        {
            throw new NotImplementedException();
        }

        public IEnumerable<Teste?> ConsultarTestes()
        {
            throw new NotImplementedException();
        }

        public Classificacao? CriarClassificacao(Classificacao classificacao)
        {
            throw new NotImplementedException();
        }

        public Configuracao? CriarConfiguracao(Configuracao configuracao)
        {
            throw new NotImplementedException();
        }

        public Jogador? CriarJogador(Jogador jogador)
        {
            throw new NotImplementedException();
        }

        public Sessao? CriarSessao(Sessao sessao)
        {
            throw new NotImplementedException();
        }

        public Teste? CriarTeste(Teste teste)
        {
            throw new NotImplementedException();
        }
    }
}
