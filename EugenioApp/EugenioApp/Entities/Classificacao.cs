using System;
using System.Collections.Generic;
using EugenioApp.Entities;
using Microsoft.EntityFrameworkCore;

namespace EugenioApp.Entities;

public partial class Classificacao
{
    public int PkClassificacao { get; set; }

    public float Wpm { get; set; }

    public int QtdErros { get; set; }

    public int QtdCertas { get; set; }

    public TimeSpan Tempo { get; set; }

    public int PontuacaoFinal { get; set; }

    public virtual ICollection<Teste> Testes { get; } = new List<Teste>();
}