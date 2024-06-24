namespace ControleDeEstabelecimentos.Modelos
{
    public class Usuario
    {
        // Atributos
        protected string nome;
        private string email;
        public string numerofila;
        protected int telefone;

        // Props
        public string Nome { get { return nome; } set { nome = value; } }
        public string Email { get { return email; } set { email = value; } }
        protected int Telefone { get { return telefone; } set { telefone = value; } }

    }
}
