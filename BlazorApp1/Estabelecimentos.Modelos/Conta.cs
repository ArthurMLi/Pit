using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ControleDeEstabelecimentos.Modelos
{
    public class Conta : Usuario
    {
        // Atributos
        protected string nome;
        private string email;
        protected int telefone;

        // Props
        public string Nome { get { return nome; } set { nome = value; } }
        public string Email { get { return email; } set { email = value; } }
        protected int Telefone { get { return telefone; } set { telefone = value; } }

    }
}
