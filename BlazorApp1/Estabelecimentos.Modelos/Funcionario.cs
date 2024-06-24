using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ControleDeEstabelecimentos.Modelos
{
    public class Funcionario
    {
        protected int id;
        protected string nome;
        protected string email;
        protected string telefone;
        public int Id { get { return id; }  set { id = value; } }
        public string Nome { get { return nome; } set { nome = value; } }
        public string Email { get { return email; } set { email = value; } }
        public string Telefone { get { return telefone; } set { telefone = value; } }

        // Metodos
        protected void IniciarFila(int Id)
        {

        }
        protected void FinalizarFila(int Id)
        {

        }
        protected string ChamarProximo(int Id, string NumeroFila)
        {
            string ProximoNumero = NumeroFila;
            return ProximoNumero;
        }


    }
}
