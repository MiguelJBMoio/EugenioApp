using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Domain.Models
{
    public class Teste
    {
        public int PK_Teste { get; set; }
        public int FK_Sessao { get; set; }
        public int FK_Jogador { get; set; }

        public int FK_Classificacao { get; set; }

        public int FK_Configuracao { get; set; }
    }
}
