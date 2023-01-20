using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Domain.Models
{
    public class Classificacao
    {

        public int PK_Classificacao { get; set; } 
        public float WPM { get; set; }
        public int QTD_Erros { get; set; }
        public int QTD_Certas { get; set; }
        public TimeOnly Tempo { get; set; }
        public int Pontuacao_Final { get; set; }

    }
}
