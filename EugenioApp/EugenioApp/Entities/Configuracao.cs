using System;
using System.Collections.Generic;
using EugenioApp.Entities;

namespace EugenioApp.Entities;

public partial class Configuracao
{
    public int PkConfiguracao { get; set; }

    public string Titulo { get; set; } = null!;

    public TimeSpan TempoConfiguracao { get; set; }

    public string Texto { get; set; } = null!;

    public virtual ICollection<Teste> Testes { get; } = new List<Teste>();
}
