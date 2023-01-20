using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Domain.Models
{
    public class Configuracao
    {
        public int PK_Configuracao { get; set; }
        public string Titulo { get; set; }
        public TimeOnly Tempo_Configuracao { get; set; }

        public string Texto { get; set; }
    }
}
