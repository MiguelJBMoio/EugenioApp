using System;
using System.Collections.Generic;

namespace EugenioApp.Entities;

public partial class Teste
{
    public int PkTeste { get; set; }

    public int FkSessao { get; set; }

    public int FkJogador { get; set; }

    public int FkClassificacao { get; set; }

    public int FkConfiguracao { get; set; }

    public virtual Classificacao FkClassificacaoNavigation { get; set; } = null!;

    public virtual Configuracao FkConfiguracaoNavigation { get; set; } = null!;

    public virtual Jogador FkJogadorNavigation { get; set; } = null!;

    public virtual Sessao FkSessaoNavigation { get; set; } = null!;
}
