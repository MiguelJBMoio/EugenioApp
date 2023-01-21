using System;
using System.Collections.Generic;

namespace EugenioApp.Entities;

public partial class Jogador
{
    public int PkJogador { get; set; }

    public string Nome { get; set; } = null!;

    public int Idade { get; set; }

    public virtual ICollection<Teste> Testes { get; } = new List<Teste>();
}
