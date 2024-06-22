using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace ControleDeEstabelecimentos.Modelos
{
    public class Funcionario
    {
        protected int Id { get; set; }
        protected string Nome { get; set; }
        private string Email { get; set; }
        protected int Telefone { get; set; }

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
