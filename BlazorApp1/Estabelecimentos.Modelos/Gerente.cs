using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ControleDeEstabelecimentos.Modelos
{
    public class Gerente : Funcionario
    {
        // Atibutos
        protected int id;
        
        // Props
        public int Id { get { return id;  } set { id = value; } }

       
    }
}
