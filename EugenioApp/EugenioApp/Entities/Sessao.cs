using System;
using System.Collections.Generic;

namespace EugenioApp.Entities;

public partial class Sessao
{
    public int PkSessao { get; set; }

    public DateTime DataSessao { get; set; }

    public virtual ICollection<Teste> Testes { get; } = new List<Teste>();
}
