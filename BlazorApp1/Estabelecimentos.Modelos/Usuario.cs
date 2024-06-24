namespace ControleDeEstabelecimentos.Modelos
{
    public class Usuario
    {
        protected string nome;
        private string email;
        public string numerofila;
        protected int telefone;
        public string Nome { get { return nome; } set { nome = value; } }
        public string Email { get { return email; } set { email = value; } }
        protected int Telefone { get { return telefone; } set { telefone = value; } }


        // Metodos
        protected void EntrarFila(int IdFila, string NumeroFila)
        {
            this.numerofila = NumeroFila;
        }
        protected string SairFila(int IdFila)
        {
            return this.numerofila;
        }
        protected int AvaliarFila(int IdFila)
        {
            int NotaFila = 5;
            return NotaFila;
        }

    }
}
